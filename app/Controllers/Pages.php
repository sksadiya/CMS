<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PageModel;
use App\Models\ContentModel;
use App\Models\CategoryModel;
use App\Models\Timeline;
class Pages extends BaseController
{
    public function index()
    {
       $page = new PageModel();
       $pages = $page->findAll();
       return view('admin/pages',['pages' => $pages]);
    }

    public function add() {
        $page = new PageModel();
        if($this->request->is('post')) {
            $pages = $this->request->getPost('page_title');

            
            $slug =$page->slug($pages);
            $data = [
                'page_title' =>$pages,
                'slug' =>$slug
            ];
            $add = $page->insert($data);
            if($add) {
                return redirect()->to('pages')->with('message','page added successfully');
            } else {
                return redirect()->to('pages')->with('error','something went wrong');
            }
           
        }
         return view('admin/addPage');
    }

    public function editPage($id)
    {
        $pages = new PageModel();
        $page = $pages->find($id);
        if (!$page) {
            return redirect()->to(base_url('pages'))->with('error', 'page with id ' . $id . ' not found');
        }
        return view('admin/editPage', ['page' => $page]);

    }

   public function updatePage() {
    $pages = new PageModel();
    if($this->request->is('post'))
    {
        $pageId = $this->request->getPost('page_id');
        
        $pagetitle = $this->request->getPost('page_title');
        $slug =$pages->slug($pagetitle);
        $data =[
            'page_title' =>$pagetitle,
            'slug' => $slug
        ];

        if($pages->update($pageId,$data)) {
            return redirect()->to('pages')->with('message', 'updated succesfully');
        }
        else {
            return redirect()->to('pages')->with('error', 'something went wrong');
        }
    }
   }

   public function delete($id)
    {
        $pages = new PageModel();
        $page = $pages->find($id);
        if (!$page) {
            return redirect()->to(base_url('pages'))->with('error', 'courosel with id ' . $id . ' not found');
        }
        $pages->delete($id);

        $timeline = new Timeline();
            $data =[
                'action_type' =>'deleted',
                'table_name' =>'pages',
                'action_description' =>'admin delete a page'
            ];
            $timeline->insert($data);
        return redirect()->to('pages')->with('message', 'Page deleted successfully');
    }

    public function showSlug($slug){
      $categories = new CategoryModel;
      $categories  =$categories->findAll();
        $contentModel = new ContentModel();
        $pageModel = new PageModel();
        $pages = $pageModel->findAll(); 
        $page = $pageModel->findBySlug($slug);

        if ($page && is_array($page) ) {

        $couroselContent = $contentModel->getCouroselContentByPage($page['page_id']);
        $bootstrap =$contentModel->getheroContentByPage($page['page_id']);
        $feature = $contentModel->getFeatureContentByPage($page['page_id']);
        $featureHeading =$contentModel->getFeatureHeadingByPage($page['page_id']); 
       
        } else {
            $couroselContent = [];
            $bootstrap = [];
            $feature  = [];
            $featureHeading = [];
        
        }
        if($pages == $page){
            $contentModel->findAll();
        }

        return view("Homepage/slugs", ['page' => $page,'pages' =>$pages ,'couroselContent' => $couroselContent ,
        'bootstrap'=>$bootstrap ,'feature'=>$feature ,'featureHeading' =>$featureHeading ,'categories' => $categories]);
}
}
