<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\Timeline;

class Categories extends BaseController
{
    public function index()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();
        return view('admin/categories', ['categories' => $categories]);
    }

    public function edit($id)
    {
        $categoryModel = new CategoryModel();
        $category = $categoryModel->find($id);
        return view('categories', ['category' => $category]);
    }
    public function update()
    {
        $categoryModel = new CategoryModel();

        $id = $this->request->getPost('cat_id');
        $data = [
            'cat_tittle' => $this->request->getPost('cat_tittle'),
        ];

        $categoryModel->update(['cat_id' => $id], $data);

        $timeline = new Timeline();
            $data =[
                'action_type' =>'updated',
                'table_name' =>'category',
                'action_description' =>'admin updates a category'
            ];
            $timeline->insert($data);
        return redirect()->to('categories')->with('message', 'category updated succesfully');
    }
    public function delete($id)
    {
        $categoryModel = new CategoryModel();

        $categoryModel->delete($id);

        $timeline = new Timeline();
            $data =[
                'action_type' =>'deleted',
                'table_name' =>'category',
                'action_description' =>'admin delete a category'
                
            ];
            $timeline->insert($data);

        return redirect()->to('categories')->with('message', 'category deleted successfully');
    }
    public function saveCategory()
    {

        $categoryName = $this->request->getPost('cat_tittle');
        $categoryModel = new CategoryModel();
        $data = [
            'cat_tittle' => $categoryName,

        ];
        $categoryModel->insert($data);

        $timeline = new Timeline();
            $data =[
                'action_type' =>'created',
                'table_name' =>'category',
                'action_description' =>'admin creates a new category'
                
            ];
            $timeline->insert($data);
        return redirect()->back()->with('message', 'Category saved successfully');
    }
}
