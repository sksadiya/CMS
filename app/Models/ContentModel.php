<?php

namespace App\Models;

use CodeIgniter\Model;

class ContentModel extends Model
{
    protected $table            = 'content';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['heading','para','primary_button','secondary_button','image','content_section','caption','sub_heading','c_name','icon_class','content_page_id'];
public function getCouroselContent() {
    return $this->where('content_section','courosel')
    ->limit(3)->get()->getResultArray();
   
}

public function getheroContent() {
    return $this->where('content_section','bootstrap')
    ->limit(1)->get()->getResultArray();
}

public function getFeatureContent() {
    return $this->where('content_section','feature')->limit(6)->get()->getResultArray();;
}


public function getFeatureHeading() {
    return $this->where('content_section','feature_heading')
    ->limit(1)->get()->getResultArray();;
}
public function getheroContentByPage($pageId) {
    return $this ->where('content_page_id',$pageId)
    ->where('content_section','bootstrap')
    ->findAll();
}

public function getFeatureContentByPage($pageId) {
    return $this->where('content_page_id' , $pageId)
    ->where('content_section','feature')
    ->findAll();
}
public function getFeatureHeadingByPage($pageId) {
    return $this->where('content_page_id', $pageId)
    ->where('content_section','feature_heading')
    ->findAll();
}
public function getCouroselContentByPage($pageId) {
  
  return $this->where('content_page_id',$pageId)
    ->where('content_section','courosel')
    ->findAll();
   
}


    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
