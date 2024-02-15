<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContentModel;
use App\Models\Timeline;
use App\Models\PageModel;
class Feature extends BaseController
{

   
    public function index()
    {
        $feature = new ContentModel();
        $featureContent = $feature->where('content_section', 'feature')->findAll();
  

        return view("HomePage/viewFeature", [
            'featureContent' => $featureContent,
          
        ]);
      
    }

    public function addFeature()
    {
        $pageModel = new PageModel();
        $pages = $pageModel->findAll();
        $feature = new ContentModel();
        if ($this->request->is('post')) {
            $data = $this->request->getPost();

            $image = $this->request->getFile('image');
            if ($image && $image->isValid() && !$image->hasMoved()) {
                $newImage = $image->getRandomName();
                $image->move('public/images/', $newImage);
                $image = $newImage;
            }
            $addata =[
                'sub_heading' =>$data['sub_heading'],
                'content_section' => $data['content_section'],
                'image' =>$image,
                'para' =>strip_tags($data['para']),
                'icon_class' =>$data['icon_class'],
                'content_page_id' => $data['content_page_id']
            ];
            $add = $feature->insert($addata);

           

            if ($add) {

                $timeline = new Timeline();
                $data =[
                    'action_type' =>'added',
                    'table_name' =>'contents',
                    'action_description' =>'admin added feature'
                ];
                $timeline->insert($data);

                return redirect()->to('feature')->with('message', 'inserted successfully');
            } else {
                return redirect()->to('feature')->with('error', 'something went wrong');
            }
        }
        return view("HomePage/addFeature" , ['pages' =>$pages]);
    }


    public function copy($id)
    {
        $feature = new ContentModel();
        $originalFeature = $feature->find($id);

        if ($originalFeature) {
            unset($originalFeature['id']);
            // $originalFeature['content_page_id'] = null;

            $newfeature = $feature->insert($originalFeature);

            if ($newfeature) {

                $timeline = new Timeline();
                $data =[
                    'action_type' =>'copied',
                    'table_name' =>'contents',
                    'action_description' =>'admin copied feature'
                ];
                $timeline->insert($data);

                return redirect()->to('feature')->with('message', 'feature copied successfully');

            } else {
                return redirect()->to('feature')->with('error', 'error');
            }
        } else {
            return redirect()->to('feature')->with('error', 'not found');
        }
    }

    public function delete($id)
    {
        $feature = new ContentModel();
        $featureDelete = $feature->find($id);
        if (!$featureDelete) {
            return redirect()->to(base_url('feature'))->with('error', 'feature with id ' . $id . ' not found');
        }
        $feature->delete($id);
        $timeline = new Timeline();
                $data =[
                    'action_type' =>'deleted',
                    'table_name' =>'contents',
                    'action_description' =>'admin deleted feature'
                ];
                $timeline->insert($data);

        return redirect()->to('feature')->with('message', 'feature deleted successfully');
    }

    public function editFeature($id) {
        $pageModel = new PageModel();
        $pages = $pageModel->findAll();
        $feature = new ContentModel();
        $featureEdit = $feature->find($id);
        if(!$featureEdit) {
            return redirect()->to('feature')->with('error','feature wirh id ' .$id. ' not found');
        }
        return view('HomePage/editFeature', ['feature' => $featureEdit ,'pages'=>$pages]);

    }

   public function updateFeature() {
        $feature = new ContentModel();
        if($this->request->is('post')) {
            $data = $this->request->getPost();

            $image = $this->request->getFile('image');
            if ($image && $image->isValid() && !$image->hasMoved()) {
                $newImage = $image->getRandomName();
                $image->move('public/images/', $newImage);
                $image = $newImage;
            } else {
                $image = $data['old_image'];
            }
            $updatedata =[
                'sub_heading' =>$data['heading'],
                'content_section' => $data['content_section'],
                'image' =>$image,
                'para' =>strip_tags($data['para']),
                'icon_class' =>$data['icon_class'],
                'content_page_id'=>$data['content_page_id']
            ];
          
           if ($feature->update($data['feature_id'], $updatedata)) {

            $timeline = new Timeline();
                $data =[
                    'action_type' =>'updated',
                    'table_name' =>'contents',
                    'action_description' =>'admin update feature'
                ];
                $timeline->insert($data);

                return redirect()->to('feature')->with('message','updated successfully');

            } 
            else {
                return redirect()->to('feature')->with('error', 'something went wrong');
            }
        }
    }

    public function featureH() {
        $feature = new ContentModel();
        $featureH = $feature->where('content_section' ,'feature_heading')->findAll();
        
        return view("HomePage/viewFeatureH", [
            'featureH' => $featureH,]);

    }


    public function addFeatureH()
    {
        $pageModel = new PageModel();
        $pages = $pageModel->findAll();
        $feature = new ContentModel();
        if ($this->request->is('post')) {
            $data = $this->request->getPost();

           
            $addata =[
                'sub_heading' =>$data['sub_heading'],
                'content_section' => $data['content_section'],
                'para' =>strip_tags($data['para']),
                'heading' =>$data['heading'],
                'content_page_id' =>$data['content_page_id']
            ];
            $add = $feature->insert($addata);
            if ($add) {
                $timeline = new Timeline();

                $data =[
                    'action_type' =>'added',
                    'table_name' =>'contents',
                    'action_description' =>'admin added new feature heading'
                ];
                $timeline->insert($data);
                return redirect()->to('featureH')->with('message', 'inserted successfully');
            } else {
                return redirect()->to('featureH')->with('error', 'something went wrong');
            }
        }
        return view("HomePage/addFeatureH" ,['pages'=>$pages]);
    }

    public function editFeatureH($id) {
        $feature = new ContentModel();
        $pageModel = new PageModel();
        $pages = $pageModel->findAll();
        $featureEditH = $feature->find($id);
        if(!$featureEditH) {
            return redirect()->to('featureH')->with('error','feature with id ' .$id. ' not found');
        }
        return view('HomePage/editFeatureH', ['feature' => $featureEditH ,'pages'=>$pages]);

    }
    public function updateFeatureH() {
        $feature = new ContentModel();
        if($this->request->is('post')) {
            $data = $this->request->getPost();

           
            $updatedata =[
                'sub_heading' =>$data['sub_heading'],
                'content_section' => $data['content_section'],
                'content_page_id'=>$data['content_page_id'],
                'para' =>strip_tags($data['para']),
                'heading' =>$data['heading']
            ];
          
           if ($feature->update($data['feature_id'], $updatedata)) {

            $timeline = new Timeline();
                $data =[
                    'action_type' =>'updated',
                    'table_name' =>'contents',
                    'action_description' =>'admin update feature heading'
                ];
                $timeline->insert($data);

                return redirect()->to('featureH')->with('message','updated successfully');

            } 
            else {
                return redirect()->to('featureH')->with('error', 'something went wrong');
            }
        }
    }

    public function deleteH($id)
    {
        $feature = new ContentModel();
        $featureDelete = $feature->find($id);
        if (!$featureDelete) {
            return redirect()->to(base_url('featureH'))->with('error', 'feature heading with id ' . $id . ' not found');
        }
        $feature->delete($id);

        $timeline = new Timeline();
                $data =[
                    'action_type' =>'deleted',
                    'table_name' =>'contents',
                    'action_description' =>'admin delete feature heading'
                ];
                $timeline->insert($data);

        return redirect()->to('featureH')->with('message', 'feature heading deleted successfully');
    }

    public function copyH($id)
    {
        $feature = new ContentModel();
        $originalFeature = $feature->find($id);

        if ($originalFeature) {
            unset($originalFeature['id']);
            // $originalFeature['content_page_id']=null;

            $newfeature = $feature->insert($originalFeature);

            if ($newfeature) {

                $timeline = new Timeline();
                $data =[
                    'action_type' =>'copied',
                    'table_name' =>'contents',
                    'action_description' =>'admin copied feature heading'
                ];
                $timeline->insert($data);

                return redirect()->to('featureH')->with('message', 'feature heading copied successfully');

            } else {
                return redirect()->to('featureH')->with('error', 'error');
            }
        } else {
            return redirect()->to('featureH')->with('error', 'not found');
        }
    }
}
