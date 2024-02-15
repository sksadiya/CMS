<?php

namespace App\Controllers;
use App\Models\PostsModel;
use App\Models\CategoryModel;
use App\Models\CommentModel;
use App\Models\ContentModel;
use App\Models\PageModel;

class Home extends BaseController
{
    public function index()
    {
        $content =new ContentModel();
        $couroselContent = $content->getCouroselContent();
        $bootstrap = $content->getheroContent();
        $feature = $content->getFeatureContent();
        $featureHeading =$content->getFeatureHeading(); 
        $pager = \Config\Services::pager();
        $postModel = new PostsModel();
        $categories = new CategoryModel();
        $pagesModel = new PageModel();
        $pages =  $pagesModel->findAll();
        $perPage = 6;
        $posts = $postModel->where('post_status', 'published')->paginate($perPage);
        $categories = $categories->findAll();
        return view('home/index',['posts' => $posts ,'categories'=> $categories ,'pager' => $pager 
        ,'couroselContent' => $couroselContent ,'bootstrap'=>$bootstrap ,'feature'=>$feature ,'featureHeading' =>$featureHeading ,'pages'=>$pages]);
    }
    public function notFound()
    {
        return view('admin/not_found'); 
    }
    public function individualPost($postId) {
        $postModel = new PostsModel();
        $categories = new CategoryModel();
        $categories = $categories->findAll();
        $commentModel = new CommentModel();
        $recentPost =$postModel->findAll();
        $pagesModel = new PageModel();
        $pages =  $pagesModel->findAll();
        $comments = $commentModel->where('comment_post_id', $postId)->findAll();
        $post = $postModel->select('posts.*, categories.cat_tittle')
            ->join('categories', 'categories.cat_id = posts.post_category_id') 
            ->where('posts.post_status', 'published')
            ->find($postId);
        if (!$post) {
            return redirect()->back();
        }
        return view('Home/individual_post', ['post' => $post ,'categories'=> $categories ,'comments' => $comments ,'recentPost'=>$recentPost ,'pages'=>$pages]);
    }
    public function authorPosts($author = '')
    {
        $pager = \Config\Services::pager();
        $postModel = new PostsModel();
        $categories = new CategoryModel();
        $categories = $categories->findAll();
        $pagesModel = new PageModel();
        $pages =  $pagesModel->findAll();
        $data['authorPosts'] = $postModel->where('post_author', $author)->where('posts.post_status', 'published')->paginate(3);
        $data['author'] = $author;
        return view('home/posts_by_author', ['authorPosts' => $data['authorPosts'],'pager' => $pager ,'categories'=> $categories ,'pages'=>$pages]);
    }
    public function postsByCategory($categoryId)
    {
        $pager = \Config\Services::pager();
        $postModel = new PostsModel();
        $categories = new CategoryModel();
        $categories = $categories->findAll();
        $pagesModel = new PageModel();
        $pages =  $pagesModel->findAll();
        $data['categoryPosts'] =  $postModel->select('posts.*, categories.cat_tittle')
        ->join('categories', 'categories.cat_id = posts.post_category_id')->where('post_category_id', $categoryId)->where('posts.post_status', 'published')->paginate(3);
        $data['categoryId'] = $categoryId;

        $data['isEmpty'] = empty($data['categoryPosts']);

        // Load the appropriate view based on whether categoryPosts is empty
        if ($data['isEmpty']) {
            return view('home/no_posts_for_category', ['isEmpty' => $data['isEmpty'],'categories'=> $categories ,'pages'=>$pages]);
        } else {
            return view('home/posts_by_category', ['categoryPosts' => $data['categoryPosts'],'pager' => $pager ,'categories'=> $categories,'pages'=>$pages]);
        }
       
    }
       public function search()
    {
        $pager = \Config\Services::pager();
        $query = $this->request->getGet('query');
        $postModel = new PostsModel();
        $categories = new CategoryModel();
        $categories = $categories->findAll();
        $pagesModel = new PageModel();
        $pages =  $pagesModel->findAll();
       if($data['searchResults'] = $postModel->searchPosts($query)) {
        return view('home/search',  ['searchResults' => $data['searchResults'],'pager' => $pager ,'categories'=> $categories ,'pages'=>$pages]);
       } else {
        return view("home/no_posts_for_category" , ['searchResults' => $data['searchResults'],'pager' => $pager ,'categories'=> $categories ,'pages'=>$pages]);
       }
    }
}
 