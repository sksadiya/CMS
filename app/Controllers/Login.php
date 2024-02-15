<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();
        return view("Home/login", ['categories' => $categories]);
    }
    public function log()
    {
        $userModel = new UserModel();

        $email = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $userModel->where('username', $email)->first();

        if ($user && password_verify($password, $user['user_password'])) {
            if ($user['user_role'] === 'admin') {
            $session = session();
            $session->set('isLoggedIn', true);
            $session->set('userData', $user);
            return redirect()->to('admin')->with('message', 'login success');
            } else {
                return redirect()->to('login')->with('fail', 'Access denied. You are not an admin.');
            }
        } else {
            return redirect()->to('login')->with('fail', 'invalid Credentials');
        }
    }
    public function logout()
    {
        $session = session();

        if ($session->get('isLoggedIn')) {
            $session->remove(['isLoggedIn', 'userData']);
        }
        return redirect()->to(base_url('/'));
    }
    public function forgotPassword()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();
        return view('home/forgot_password', ['categories' => $categories]);
    }
}
