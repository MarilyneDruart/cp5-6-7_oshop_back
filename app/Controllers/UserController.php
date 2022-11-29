<?php

namespace App\Controllers;

use App\Models\AppUser;

class UserController extends CoreController
{
    public function login($email) {

        $email = AppUser::findByEmail($email);
        
        if $email

        $this->show('user/login');
    }

    public function loginPost () {
        $this->show('user/login');
    }
}