<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'user_id';
    
protected $allowedFields = ['username','user_firstname','user_lastname','user_email','user_password','user_role','user_image' ,'reset_token'];

public function insertUser($username,$email, $password,$userRole) {
    $userData = [
        'username' => $username,
        'user_email' => $email,
        'user_password' => password_hash($password, PASSWORD_DEFAULT),
        'user_role'=> 'subscriber'
        
    ];

    return $this->insert($userData);
}

}
