<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContentModel;
use App\Models\Timeline;
use App\Models\PageModel;

class Content extends BaseController
{
    public function index()
    {
        $courosel = new ContentModel();
        $content = $courosel->where('content_section', 'courosel')->findAll();

        return view("HomePage/viewCourosel", ['content' => $content]);
    }

    public function addCourosel()
    {
        $courosel = new ContentModel();
        $pageModel = new PageModel();
        $pages = $pageModel->findAll();
        $content = $courosel->findAll();
        if ($this->request->is('post')) {
            $caption = $this->request->getPost('caption');
            $description = $this->request->getPost('description');
            $name = $this->request->getPost('name');
            $content = $this->request->getPost('content_section');
            $image1 = $this->request->getFile('image1');
            if ($image1 && $image1->isValid() && !$image1->hasMoved()) {
                $newImage1 = $image1->getRandomName();
                $image1->move('public/images/', $newImage1);
                $image1 = $newImage1;
            }
           

            $data = [
                'c_name' => $name,
                'caption' => $caption,
                'para' => $description,
                'image' => $image1,
                'content_section' => $content,
                'content_page_id' => $this->request->getPost('content_page_id') ,
             ];
            $add = $courosel->insert($data);

            $timeline = new Timeline();
            $data =[
                'action_type' =>'added',
                'table_name' =>'contents',
                'action_description' =>'admin add data to sliders'
            ];
            $timeline->insert($data);
    

            if ($add) {
                return redirect()->to('courosel')->with('message', 'inserted');
            } else {
                return redirect()->to('add')->with('error', 'something went wrong');
            }

        }
        return view("HomePage/addCourosel" ,['pages' =>$pages ,'contents'=>$content]);
    }

    public function editCourosel($id)
    {
        $pageModel = new PageModel();
        $pages = $pageModel->findAll();
        $courosel = new ContentModel();
        $homeCourosel = $courosel->find($id);
        if (!$homeCourosel) {
            return redirect()->to(base_url('courosel'))->with('error', 'courosel with id ' . $id . ' not found');
        }
        return view('HomePage/editCourosel', ['homeCourosel' => $homeCourosel,'pages'=>$pages]);
    }

    public function updateCourosel()
    {
        $courosel = new ContentModel();
        if ($this->request->is('post')) {
            $data = $this->request->getPost();

            $image1 = $this->request->getFile('image1');
            if ($image1 && $image1->isValid() && !$image1->hasMoved()) {
                $newImage1 = $image1->getRandomName();
                $image1->move('public/images/', $newImage1);
                $image1 = $newImage1;
            } else {
                $image1 = $data['old_image1'];
            }

            $updatedata = [
                'c_name' => $data['name'],
                'caption' => $data['caption'],
                'para' => $data['description'],
                'image' => $image1,
                'content_page_id' => $this->request->getPost('content_page_id'),
                'content_section' => $data['content_section']
            ];

            if ($courosel->update($data['courosel_id'], $updatedata)) {

                $timeline = new Timeline();
            $data =[
                'action_type' =>'updated',
                'table_name' =>'contents',
                'action_description' =>'admin update data of sliders'
            ];
            $timeline->insert($data);

                return redirect()->to('courosel')->with('message', 'updated succesfully');
            }
            else {
                return redirect()->to('courosel')->with('error', 'something went wrong');
            }

        }
    }
    public function delete($id)
    {
        $courosel = new ContentModel();
        $couroselDelete = $courosel->find($id);
        if (!$couroselDelete) {
            return redirect()->to(base_url('courosel'))->with('error', 'courosel with id ' . $id . ' not found');
        }
        $courosel->delete($id);

        $timeline = new Timeline();
            $data =[
                'action_type' =>'deleted',
                'table_name' =>'contents',
                'action_description' =>'admin delete data of sliders'
            ];
            $timeline->insert($data);
        return redirect()->to('courosel')->with('message', 'Courosel deleted successfully');
    }


public function copy($id)
{
    $courosel = new ContentModel();
    $originalCarousel = $courosel->find($id);

    if ($originalCarousel) {
        unset($originalCarousel['id']);
        // $originalCarousel['content_page_id'] = null;

        $newCarouselId = $courosel->insert($originalCarousel);

        if ($newCarouselId) {

            $timeline = new Timeline();
            $data =[
                'action_type' =>'copy',
                'table_name' =>'contents',
                'action_description' =>'admin copy data of sliders'
            ];
            $timeline->insert($data);

        return redirect()->to('courosel')->with('message', 'Courosel copied successfully');

        } else {
            return redirect()->to('courosel')->with('error', 'error');

        }
    } else {
        return redirect()->to('courosel')->with('error', 'not found');
    }
}

}
