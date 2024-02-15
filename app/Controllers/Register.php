<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();
        return view("Home/register", ['categories' => $categories]);
    }
    public function createUser()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();
            $userModel = new UserModel();
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $username = $this->request->getPost('username');
            $userRole='subscriber';
            $existingUser = $userModel->where('user_email', $email)->first();
        if ($existingUser) {
            $validationMessages = ['user_email' => 'The email address is already taken.'];
            return redirect()->to('register')->with('validationMessages', $validationMessages);
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validationMessages = ['user_email' => 'Please enter a valid email address.'];
            return redirect()->to('register')->with('validationMessages', $validationMessages);
        }
        $userId = $userModel->insertUser($username, $email, $password, $userRole);
        if ($userId) {
            $user = $userModel->find($userId);
            return redirect()->to('/');
        } else {
            return redirect()->back()->withInput()->with('errors', 'Something went wrong');
        }
    }

   }


