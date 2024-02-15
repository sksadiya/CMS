<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommentModel;
use App\Models\PostsModel;
use App\Models\Timeline;

class Comments extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $perPage = 10;
        $commentModel = new CommentModel();
        $postModel = new PostsModel();
        $posts = $postModel->findAll();
        $comments = $commentModel->select('comments.*, posts.post_tittle')
            ->join('posts', 'posts.post_id = comments.comment_post_id')->paginate($perPage);
        $pager = $commentModel->pager;
        return view('admin/comments', ['comments' => $comments, 'pager' => $pager]);
    }
    public function leaveComment($post_id)
    {
        if ($this->request->getMethod() === 'post') {
            $email =$this->request->getPost('comment_email');
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $validationMessages = ['comment_email' => 'Please enter a valid email address.'];
                return redirect()->to('post/' . $post_id)->with('validationMessages', $validationMessages);
            }
            $data = [
                'comment_post_id' => $post_id,
                'comment_author' => $this->request->getPost('comment_author'),
                'comment_email' => $email,
                'comment_content' => $this->request->getPost('comment_content'),
                'comment_status' => 'disapproved',
            ];
            $commentModel = new CommentModel();
            $commentModel->insert($data);
            $postModel = new PostsModel();
            $postModel->updateCommentCount($post_id);
            return redirect()->to(base_url('post/' . $post_id));
        }

    }
    public function handleBulkOptions()
    {
        if ($this->request->getMethod() === 'post') {
            $selectedOption = $this->request->getPost('select');
            $selectedComments = $this->request->getPost('checkBoxArray');

            if (!empty($selectedOption) && !empty($selectedComments)) {
                $commentModel = new CommentModel();
                $postModel = new PostsModel();
                switch ($selectedOption) {
                    case 'approve':
                        $commentModel->whereIn('comment_id', $selectedComments)->set(['comment_status' => 'approve'])->update();
                        break;
                    case 'disapprove':
                        $commentModel->whereIn('comment_id', $selectedComments)->set(['comment_status' => 'disapprove'])->update();
                        break;
                    case 'delete':
                        foreach ($selectedComments as $commentId) {
                            $comment = $commentModel->find($commentId);
                            if ($comment) {
                                $postId = $comment['comment_post_id'];
                                $commentModel->delete($commentId);
                                $postModel->updateCommentCount($postId);
                            }
                        }
                        break;
                    default:
                        return redirect()->to(base_url('comments'))->with('error', 'Invalid action selected.');

                }
                return redirect()->to(base_url('comments'))->with('message', 'Bulk action completed.');
            } else {
                return redirect()->to(base_url('comments'))->with('error', 'No comments selected.');
            }
        }
    }
    public function delete($id)
    {
        $commentModel = new CommentModel();
        $comment = $commentModel->find($id);
        if (!$comment) {
            return redirect()->to(base_url('not_found'))->with('error', 'comment not found');
        }

        $postId = $comment['comment_post_id'];
        $commentModel->delete($id);
        $postModel = new PostsModel();
        $postModel->updateCommentCount($postId);

        $timeline = new Timeline();
        $data =[
            'action_type' =>'deleted',
            'table_name' =>'comments',
            'action_description' =>'admin delete a comments'
        ];
        $timeline->insert($data);

      
        return redirect()->to('comments')->with('message', 'comment deleted successfully');
    }
    public function viewComments($postId)
    {
        $commentModel = new CommentModel();
        $comments = $commentModel->select('comments.*, posts.post_tittle')
            ->join('posts', 'posts.post_id = comments.comment_post_id')->where('comment_post_id', $postId)->findAll();

        return view('admin/view_comments', ['comments' => $comments]);
    }

}


