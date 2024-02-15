<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table            = 'comments';
    protected $primaryKey       = 'comment_id';

    protected $allowedFields =['comment_post_id','comment_author','comment_content','comment_date','comment_email','comment_status'];
    public function getCommentCount($postId)
    {
        return $this->where('comment_post_id', $postId)->countAllResults();
    }
}
