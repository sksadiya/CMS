<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\CategoryModel;
class ResetPassword extends BaseController
{
    public function index()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();
        $token = $this->request->getGet('token');
        
        if (!empty($token)) {
            return view('home/reset_password', ['token' => $token ,'categories'=> $categories]);
        }
        else {
            return redirect()->to('login')->with('fail', 'Invalid or expired reset token.');
        }
        
    }

    public function reset()
    {
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');

        // Check if the token is valid (you might want to add additional checks)
        if (empty($token)) {
            return redirect()->to('login')->with('fail', 'Invalid reset token.');
        }
        $userModel = new UserModel();
        $user = $userModel->where('reset_token', $token)->first();

        if (!$user) {
            return redirect()->to('login')->with('fail', 'Invalid reset token.');
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $userModel->set(['user_password' => $hashedPassword, 'reset_token' => null])->where('user_id', $user['user_id'])->update();

        return redirect()->to('login')->with('message', 'Password reset successfully. You can now log in with your new password.');
    }
}
