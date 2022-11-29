<?php

namespace App\Controllers;

use App\Models\AppUser;

class UserController extends CoreController
{
    /**
     * Formulaire de connexion
     */
    public function login()
    {
        $this->show('user/login');
    }

    /**
     * Traitement du formulaire de connexion
     */
    public function loginPost()
    {
        global $router;

        extract($_POST, EXTR_SKIP);

        $user = AppUser::findByEmail($email ?? '');

        if ($user && password_verify($password, $user->getPassword())) {
            $_SESSION['userId'] = $user->getId();
            $_SESSION['userObject'] = $user;
            header('Location: ' . $router->generate('main-home'));
        } else {
            //header('Location: ' . $router->generate('user-login'));
            echo 'Identifiants erronés.';

        }
    }

    /**
     * Déconnexion
     */
    public function logout()
    {
        global $router;

        unset(
            $_SESSION['userId'],
            $_SESSION['userObject'],
        );

        header('Location: ' . $router->generate('user-login'));
    }

}