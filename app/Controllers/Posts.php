<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostsModel;
use App\Models\CategoryModel;
use App\Models\CommentModel;
use App\Models\Timeline;
class Posts extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $postModel = new PostsModel();
        $commentModel = new CommentModel();
        $perPage = 5;
        $posts = $postModel->select('posts.*, categories.cat_tittle')
            ->join('categories', 'categories.cat_id = posts.post_category_id')->paginate($perPage);
        foreach ($posts as &$post) {
            $post['post_comment_count'] = $commentModel->getCommentCount($post['post_id']);
        }
        $pager = $postModel->pager;
        return view('admin/posts', ['posts' => $posts, 'pager' => $pager]);
    }
    public function addPost()
    {
        $postModel = new PostsModel();
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();
        if ($this->request->getMethod() === 'post') {
            $postData = $this->request->getPost();
            $postImage = $this->request->getFile('post_image');
            $newName = $postImage->getRandomName();
            $postImage->move('public/images/', $newName);
            $postData['post_image'] = $newName;
            $postModel->insert($postData);

            $timeline = new Timeline();
            $data =[
                'action_type' =>'created',
                'table_name' =>'posts',
                'action_description' =>'admin creates a new post'
                
            ];
            $timeline->insert($data);
           
            return redirect()->back()->with('message', 'success');
        }

       


        return view('admin/add_post', ['categories' => $categories]);
    }

    public function editPost($id)
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();
        $postModel = new PostsModel();
        $post = $postModel->find($id);
        if (!$post) {
            return redirect()->to(base_url('not_found'));
        }
        return view('admin/edit_post', ['post' => $post, 'categories' => $categories]);
    }
    public function updatePost()
    {
        $postModel = new PostsModel();
        $postData = $this->request->getPost();
        $post = $postModel->find($postData['post_id']);
        if (!$post) {
            return redirect()->to(base_url('not_found'));
        }
        $postImage = $this->request->getFile('post_image');
        if ($postImage->isValid() && !$postImage->hasMoved()) {
            $newName = $postImage->getRandomName();
            $postImage->move('public/images/', $newName);
            $postData['post_image'] = $newName;
        } else {
            $postData['post_image'] = $postData['old_image'];
        }

        $updatedData = [
            'post_tittle' => $postData['post_tittle'],
            'post_status' => $postData['post_status'],
            'post_category_id' => $postData['post_category_id'],
            'post_image' => $postData['post_image'],
            'post_content' => $postData['post_content'],
            'post_author' => $postData['post_author'],
            'post_tags' => $postData['post_tags'],
        ];

        $postModel->update($postData['post_id'], $updatedData);
        $timeline = new Timeline();
        $data =[
            'action_type' =>'updated',
            'table_name' =>'posts',
            'action_description' =>'admin update a post'
        ];
        $timeline->insert($data);
        return redirect()->to('posts')->with('message', 'updated succesfully');
    }

    public function delete($id)
    {
        $postModel = new PostsModel();
        $post = $postModel->find($id);
        if (!$post) {
            return redirect()->to(base_url('not_found'));
        }
        $postModel->delete($id);
        $timeline = new Timeline();
            $data =[
                'action_type' =>'deleted',
                'table_name' =>'posts',
                'action_description' =>'admin delete a post'
                
            ];
            $timeline->insert($data);
        return redirect()->to('posts')->with('message', 'post deleted successfully');
    }
    public function viewPost($postId)
    {
        $postModel = new PostsModel();
        $post = $postModel->select('posts.*, categories.cat_tittle')
            ->join('categories', 'categories.cat_id = posts.post_category_id')
            ->find($postId);
        if (!$post) {
            return redirect()->to(base_url('not_found'));
        }
        return view('admin/view_post', ['post' => $post]);
    }
    public function handleBulkAction()
    {
        $selectedAction = $this->request->getPost('select');
        $selectedPosts = $this->request->getPost('checkBoxArray');

        if (empty($selectedPosts)) {
            return redirect()->to(base_url('posts'))->with('error', 'No posts selected.');
        }

        switch ($selectedAction) {
            case 'published':
                $this->publishPosts($selectedPosts);
                break;

            case 'draft':
                $this->setPostsToDraft($selectedPosts);
                break;

            case 'delete':
                $this->deletePosts($selectedPosts);
                break;

            case 'clone':
                $this->clonePosts($selectedPosts);
                break;

            default:
                return redirect()->to(base_url('posts'))->with('error', 'Invalid action selected.');
        }

        return redirect()->to(base_url('posts'))->with('message', 'Bulk action completed.');
    }

    private function publishPosts($selectedPosts)
    {
        $postModel = new PostsModel();
        $data = ['post_status' => 'published'];

        foreach ($selectedPosts as $postId) {
            $postModel->update($postId, $data);
        }
    }

    private function setPostsToDraft($selectedPosts)
    {
        $postModel = new PostsModel();
        $data = ['post_status' => 'draft'];

        foreach ($selectedPosts as $postId) {
            $postModel->update($postId, $data);
        }
    }

    private function deletePosts($selectedPosts)
    {
        $postModel = new PostsModel();
        foreach ($selectedPosts as $postId) {
            $postModel->delete($postId);
        }
    }
    private function clonePosts($selectedPosts)
    {
        foreach ($selectedPosts as $postId) {
            $postModel = new PostsModel();
            $originalPost = $postModel->find($postId);
            unset($originalPost['post_id']);
            $postModel->insert($originalPost);
        }
    }

public function likePost($postId)
{
    $postModel = new PostsModel();
    $currentLikes = $postModel->find($postId)['post_likes_count'];
    $newLikes = $currentLikes + 1;
    $postModel->update($postId, ['post_likes_count' => $newLikes]);
    return $this->response->setJSON(['likes' => $newLikes]);
}

}





