<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\CategoryModel;

class ForgotPassword extends BaseController
{
    public function index()
    {

        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();
        return view("Home/forgot_password", ['categories' => $categories]);
    }
    public function sendResetLink()
    {
        $email = $this->request->getPost('email');
        $validationRules = [
            'email' => 'required|valid_email',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('forgot')->withInput()->with('fail', 'Invalid email address.');
        }
        $userModel = new UserModel();
        $user = $userModel->where('user_email', $email)->first();

        if (!$user) {
            return redirect()->to('forgot')->withInput()->with('fail', 'Email not found.');
        }
        
        $token = bin2hex(random_bytes(16)) ;
        $userModel->set('reset_token', $token)->where('user_id', $user['user_id'])->update();
        $this->sendResetEmail($email, $token);

        return redirect()->to('forgot')->with('message', 'Password reset link sent to your email.');
    }

    private function sendResetEmail($email, $token)
    {
        $emailLib = \Config\Services::email();
        $config['mailType'] = 'html';
        $emailLib->initialize($config);
        $emailLib->setTo($email);
        $emailLib->setSubject('Password Reset Link');
        $resetLink = site_url("reset-password?token={$token}");
        $message= "<p>Click the button below to reset your password:</p>
        <a href='{$resetLink}' style='display:inline-block;padding:10px 20px;background-color:#3498db;color:#ffffff;text-decoration:none;border-radius:5px;'>Reset Password</a>";
        $emailLib->setMessage($message);
        $emailLib->send();
        if ($emailLib->send()) {
            return redirect()->to("reset-password?token={$token}");
        } 
        
    }
}


