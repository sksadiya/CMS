<?php

namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model
{
    protected $table            = 'posts';
    protected $primaryKey       = 'post_id';
  
    protected $allowedFields =['post_comment_count','post_category_id','post_tittle','post_author','post_user','post_content','post_image','post_tags','post_date','post_status','post_likes_count'];
    public function searchPosts($query)
    {
        return $this->select('posts.*, categories.cat_tittle')
            ->join('categories', 'categories.cat_id = posts.post_category_id')
            ->where('posts.post_status', 'published')
            ->groupStart()
                ->like('posts.post_tags', $query)
                ->orLike('posts.post_tittle', $query)
                ->orLike('posts.post_author', $query)
            ->groupEnd()
            ->paginate(3);
    }
    public function updateCommentCount($postId)
    {
        $commentModel = new CommentModel();
        $commentCount = $commentModel->where('comment_post_id', $postId)->countAllResults();
        $this->set('post_comment_count', $commentCount)
             ->where('post_id', $postId)
             ->update();
    }

}
