<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostsModel;
use App\Models\CategoryModel;
use App\Models\CommentModel;
use App\Models\UserModel;
use App\Models\Timeline;


class Admin extends BaseController
{
    public function index()
    {
        $postModel = new PostsModel();
        $categoryModel = new CategoryModel();
        $commentModel = new CommentModel();
        $userModel = new UserModel();
        $timeline = new Timeline();
        $timelinedata = $timeline->orderBy('created_at', 'DESC')->limit(5)->get()->getResultArray();
        $postCount = $postModel->countAll();
        $categoryCount = $categoryModel->countAll();
        $commentCount = $commentModel->countAll();
        $userCount = $userModel->countAll();
        $publishPostCount = $postModel->where('post_status', 'published')->countAllResults();
        $draftPostCount = $postModel->where('post_status', 'draft')->countAllResults();
        $approveCommentCount = $commentModel->where('comment_status', 'approve')->countAllResults();
        $subscriberCount = $userModel->where('user_role', 'subscriber')->countAllResults();
        return view('admin/index', [
            'postCount' => $postCount,
            'categoryCount' => $categoryCount,
            'commentCount' => $commentCount,
            'userCount'=> $userCount,
            'publishPostCount' => $publishPostCount,
            'draftPostCount' => $draftPostCount,
            'approveCommentCount' => $approveCommentCount,
            'subscriberCount' => $subscriberCount,
            'timelinedata' =>  $timelinedata
        ]);
    }
}
