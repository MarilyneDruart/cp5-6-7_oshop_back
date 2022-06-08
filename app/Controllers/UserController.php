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
        $this->checkAuthorization(['admin', 'catalog-manager']);

        global $router;

        unset(
            $_SESSION['userId'],
            $_SESSION['userObject'],
        );

        header('Location: ' . $router->generate('user-login'));
    }

    /**
     * Liste des utilisateurs
     */
    public function list()
    {
        $this->checkAuthorization(['admin']);

        // Appel statique à findAll()
        $users = AppUser::findAll();
        $this->show('user/list', [
            'users' => $users,
        ]);
    }

    /**
     * Formulaire d'ajout d'un utilisateur
     */
    public function add()
    {
        $this->checkAuthorization(['admin']);

        $this->show('user/add');
    }

    /**
     * Ajout d'un utilisateur
     */
    public function store($id = null)
    {
        $this->checkAuthorization(['admin']);

        $forUpdate = isset($id);

        extract($_POST, EXTR_SKIP);

        $errors = [];

        $minuscule = preg_match('@[a-z]@', $password);
        $majuscule = preg_match('@[A-Z]@', $password);
	    $chiffre = preg_match('@[0-9]@', $password);
        $caracSpe = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).*[0-9A-Za-z_\-\|\%\&\*\=\@\$]{8,}$/gm', $password);

        if (!isset($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'L\'adresse mail est invalide';
        }

        if (!isset($password) || strlen($password) < 3 || $minuscule || !$majuscule || $chiffre || $caracSpe) {
            $errors[] = 'Le mot de passe est invalide';
        }

        if (!isset($lastname) || !is_string($lastname) || strlen($lastname) < 3) {
            $errors[] = 'Le prénom est invalide';
        }

        if (!isset($firstname) || !is_string($firstname) || strlen($firstname) < 3) {
            $errors[] = 'Le nom est invalide';
        }

        if (!isset($role) || !in_array($role, ['catalog-manager', 'admin'])) {
            $errors[] = 'Le rôle est invalide';
        }

        if (!isset($status) || !in_array($status, [1, 2])) {
            $errors[] = 'Le statut est invalide';
        }

        // S'il n'y a pas d'erreurs
        if (!$errors) {
            // On créé/modifie l'utilisateur
            // Si forUpdate est faux : On créé un nouvel utilisateur en instanciant un nouvel utilisateur
            // et inserer les données ->insert
            // Si forUpdate est vrai: on utilise la méthode find($id) pour récup l'utilisateur ciblé
            // pour la mettre à jour ->update
            $user = $forUpdate ? AppUser::find($id) : new AppUser();

            // On fixe des valeurs pour nos propriétés
            $user->setEmail(htmlspecialchars($email));
            $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
            $user->setLastname(isset($lastname) ? htmlspecialchars($lastname) : null);
            $user->setFirstname(isset($firstname) ? htmlspecialchars($firstname) : null);
            $user->setRole(isset($role) ? htmlspecialchars($role) : null);
            $user->setStatus(isset($status) ? htmlspecialchars($status) : null);

            // On teste si l'insertion dans la table s'est bien passée
            if ($user->save()) {
                global $router;
                $redirect = $forUpdate ? $router->generate('user-add', ['id' => $user->getId()]) : $router->generate('user-list');
                header('Location: ' . $redirect);
                return;
            } else {
                $errors[] = 'Echec lors de l\'enregistrement';
            }
        }

        if ($forUpdate) {
            $this->show('user/add', [
                'errors' => $errors,
                'user' => AppUser::find($id),
            ]);
        } else {
            $this->show('user/add', [
                'errors' => $errors,
            ]);
        }
    }

}