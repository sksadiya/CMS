<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\Timeline;

class Users extends BaseController
{
    public function index()
    {
        $userRole = session()->get('userData')['user_role'];

        // Check if the user has the required role to access the page
        if ($userRole !== 'admin') {
            return redirect()->to('admin')->with('fail', 'You do not have permission to view all users.');
        }
        $userModel = new UserModel();
        $pager = \Config\Services::pager();
        $perPage = 10;
        $users = $userModel->paginate($perPage);
        $pager = $userModel->pager;
        return view("admin/view_all_users", ["users" => $users, "pager" => $pager]);
    }
    public function userBulk()
    {
        $selectedOption = $this->request->getPost('select');
        $selectedUsers = $this->request->getPost('checkBoxArray');
        if (empty($selectedUsers)) {
            return redirect()->to(base_url('users'))->with('error', 'No users selected.');
        }

        $userModel = new UserModel();

        switch ($selectedOption) {
            case 'subscriber':
                $userModel->update($selectedUsers, ['user_role' => 'subscriber']);
                $message = 'Selected users updated to Subscriber.';
                break;

            case 'admin':
                $userModel->update($selectedUsers, ['user_role' => 'admin']);
                $message = 'Selected users updated to Admin.';
                break;

            case 'delete':
                $userModel->delete($selectedUsers);
                $message = 'Selected users deleted.';
                break;

            default:
                $message = 'Invalid option selected.';
        }
        return redirect()->to('users')->with('message', $message);
    }
    public function editUser($user_Id)
    {
        $userRole = session()->get('userData')['user_role'];
        if ($userRole !== 'admin') {
            return redirect()->to('admin')->with('fail', 'You do not have permission to edit users.');
        }
        $userModel = new UserModel();
        $user = $userModel->find($user_Id);

        if (!$user) {
            return redirect()->to('users')->with('error', 'User not found.');
        }
        $user['user_id'] = $user_Id;
        return view('admin/edit_user', ['user' => $user]);
    }
    public function updateUser()
    {
        $userModel = new UserModel();
        $id = $this->request->getPost('user_id');
        $user = $userModel->find($id);
        if (!$user) {
            return redirect()->to('users')->with('error', 'User not found.');
        }
        $first_name = $this->request->getPost('firstname');
        $last_name = $this->request->getPost('lastname');
        $email = $this->request->getPost('user_email');
        $user_role = $this->request->getPost('user_role');
        $username = $this->request->getPost('username');
       
        $data = [
            'user_firstname' => $first_name,
            'user_lastname' => $last_name,
            'user_email' => $email,
            'user_role' => $user_role,
            'username' => $username
        ];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->to("users/editUser/{$id}")->with('fail', 'Please enter a valid email address.');
        } else {
            $userModel->update($id, $data);
            return redirect()->to('users')->with('message', 'updated succesfully');
        }

    }
    public function deleteUser($userId)
    {
        $userModel = new UserModel();
        $user = $userModel->find($userId);
        if (!$user) {
            return redirect()->to('users')->with('error', 'User not found.');
        }
        $userModel->delete($userId);
        return redirect()->to('users')->with('message', 'User deleted successfully.');
    }
    public function addUserForm()
    {
        return view("admin/add_user");
    }
    public function addUser()
    {
        $password = $this->request->getPost('password');
        $userData = [
            'username' => $this->request->getPost('username'),
            'user_email' => $this->request->getPost('user_email'),
            'user_password' => password_hash($password, PASSWORD_DEFAULT),
            'user_role' => $this->request->getPost('user_role'),
            'user_firstname' => $this->request->getPost('firstname'),
            'user_lastname' => $this->request->getPost('lastname'),
        ];
        $userModel = new UserModel();
        if (!filter_var($userData['user_email'], FILTER_VALIDATE_EMAIL)) {
            return redirect()->to("add_users")->with('message', 'enter valid email');
        } else {
            $userModel->save($userData);
            return redirect()->to('users')->with('message', 'User added successfully');
        }
    }
    public function profile()
    {
        $userData = session()->get('userData');
        return view('admin/profile', ['userData' => $userData]);
    }
    public function updateProfile()
    {

        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login')->with('fail', 'You must be logged in to update your profile.');
        }

        $firstname = $this->request->getPost('firstname');
        $lastname = $this->request->getPost('lastname');
        $username = $this->request->getPost('username');
        $userEmail = $this->request->getPost('user_email');
        $password = $this->request->getPost('password');


        if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            return redirect()->to('profile')->with('fail', 'Invalid email format.');
        }

        $userId = session()->get('userData')['user_id'];
        $userModel = new UserModel();
        $userData = $userModel->find($userId);

        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $userModel->update($userId, ['user_password' => $hashedPassword]);
        }

        $userModel->update($userId, [
            'user_firstname' => $firstname,
            'user_lastname' => $lastname,
            'username' => $username,
            'user_email' => $userEmail,
        ]);
        session()->push('userData', [
            'user_firstname' => $firstname,
            'user_lastname' => $lastname,
            'username' => $username,
            'user_email' => $userEmail,
        ]);

        $timeline = new Timeline();
                $data =[
                    'action_type' =>'updated',
                    'table_name' =>'profile',
                    'action_description' =>'admin update his profile'
                ];
                $timeline->insert($data);
        return redirect()->to('profile')->with('message', 'Profile updated successfully.');
    }

}









