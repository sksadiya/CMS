<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table            = 'categories';
protected $primaryKey = 'cat_id';
    protected $allowedFields =['cat_tittle'];
}
