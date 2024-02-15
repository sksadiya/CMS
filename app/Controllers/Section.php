<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContentModel;
use App\Models\Timeline;
use App\Models\PageModel;

class Section extends BaseController
{
    public function index()
    {
        $section = new ContentModel();
        $content = $section->where('content_section', 'bootstrap')->findAll();

        return view("HomePage/viewSection", ['content' => $content]);
    }

    public function addSection()
    {
        $section = new ContentModel();
        $pageModel = new PageModel();
        $pages = $pageModel->findAll();

        if ($this->request->is('post')) {
            $dataPost = $this->request->getPost();
            $image = $this->request->getFile('image');
            if ($image && $image->isValid() && !$image->hasMoved()) {
                $newImage = $image->getRandomName();
                $image->move('public/images/', $newImage);
                $image = $newImage;
            }
            $data = [
                'heading' => $dataPost['heading'],
                'para' => $dataPost['para'],
                'primary_button' => $dataPost['pbutton'],
                'secondary_button' => $dataPost['sbutton'],
                'image' => $image,
                'content_section' => $dataPost['content_section'],
                'content_page_id' =>$dataPost['content_page_id']
            ];
            $add = $section->insert($data);
            if ($add) {
                $timeline = new Timeline();
                $data =[
                    'action_type' =>'created',
                    'table_name' =>'contents',
                    'action_description' =>'admin create a new section'
                ];
                $timeline->insert($data);
                return redirect()->to('sectionB')->with('message', 'inserted');
            } else {
                return redirect()->to('addSection')->with('error', 'something went wrong');
            }
        }
        return view("HomePage/addSection",['pages'=>$pages]);

    }
    public function delete($id)
    {
        $section = new ContentModel();
        $sectionDelete = $section->find($id);
        if (!$sectionDelete) {
            return redirect()->to('sectionB')->with('error', 'section with id ' . $id . ' not found');
        }
        $section->delete($id);
        $timeline = new Timeline();
        $data =[
            'action_type' =>'deleted',
            'table_name' =>'contents',
            'action_description' =>'admin deletes a section'
        ];
        $timeline->insert($data);
        return redirect()->to('sectionB')->with('message', 'Section deleted successfully');
    }

    public function copy($id)
    {
        $section = new ContentModel();
        $originalSection = $section->find($id);

        if ($originalSection) {
            unset($originalSection['id']);
            // $originalSection['content_page_id']=null;

            $newSectionId = $section->insert($originalSection);

            if ($newSectionId) {

                $timeline = new Timeline();
                $data =[
                    'action_type' =>'copied',
                    'table_name' =>'contents',
                    'action_description' =>'admin copied a section'
                ];
                $timeline->insert($data);

                return redirect()->to('sectionB')->with('message', 'Section copied successfully');

            } else {
                return redirect()->to('sectionB')->with('error', 'error to copy section');

            }
        } else {
            return redirect()->to('sectionB')->with('error', 'Section not found');
        }
    }

    public function editSection($id)
    {
        $pageModel = new PageModel();
        $pages = $pageModel->findAll();
        $section = new ContentModel();
        $homeSection = $section->find($id);
        if (!$homeSection) {
            return redirect()->to(base_url('sectionB'))->with('error', 'Section  with id ' . $id . ' not found');
        }
        return view('HomePage/editSection', ['homeSection' =>  $homeSection, 'pages'=>$pages]);
    }
public function updateSection() {
    $section = new ContentModel();
    if($this->request->getPost()) {
        $data = $this->request->getPost();

        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newImage = $image->getRandomName();
            $image->move('public/images/', $newImage);
            $image = $newImage;
        } else {
            $image = $data['old_image'];
        }
        $updatedata = [
            'heading' => $data['heading'],
            'para' => $data['para'],
            'primary_button' => $data['pbutton'],
            'secondary_button' =>  $data['sbutton'],
            'content_section' => $data['content_section'],
            'image' =>$image,
            'content_page_id' => $data['content_page_id']
        ];
        if ($section->update($data['section_id'], $updatedata)) {

            $timeline = new Timeline();
            $data =[
                'action_type' =>'updated',
                'table_name' =>'contents',
                'action_description' =>'admin updates a section'
            ];
            $timeline->insert($data);

            return redirect()->to('sectionB')->with('message', 'updated succesfully');
        }
        else {
            return redirect()->to('sectionB')->with('error', 'something went wrong');
        }

    }
}
}
