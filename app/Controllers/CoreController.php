<?php

namespace App\Controllers;

abstract class CoreController
{
    public function __construct()
    {
        // On doit récupérer la route qui a "matchée" avec la requête de mon visiteur
        // acl (Access Control List) permet de voir toutes les autorisations d'un coup
        global $match;

        $route_name = $match['name'] ?? null;

        $acl = [
            'main-home' => ['admin', 'catalog-manager'],

            'user-list' => ['admin'],
            'user-add' => ['admin'],
            'user-create' => ['admin'],
            'user-edit' => ['admin'],
            'user-update' => ['admin'],

            'product-list' => ['admin', 'catalog-manager'],
            'product-add' => ['admin', 'catalog-manager'],
            'product-create' => ['admin', 'catalog-manager'],
            'product-edit' => ['admin', 'catalog-manager'],
            'product-update' => ['admin', 'catalog-manager'],

            'category-list' => ['admin', 'catalog-manager'],
            'category-add' => ['admin', 'catalog-manager'],
            'category-create' => ['admin', 'catalog-manager'],
            'category-edit' => ['admin', 'catalog-manager'],
            'category-update' => ['admin', 'catalog-manager'],
            'category-home-selection' => ['admin', 'catalog-manager'],

        ];

        if (array_key_exists($route_name, $acl)) {
            $this->checkAuthorization($acl[$route_name]);
        }

        // Protection CSRF
        if (!isset($_SESSION['_token'])) {
            $_SESSION['_token'] = $this->generateCSRFToken();
        }

        // si requete de type POST
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // vérification du token CSRF, si pas de token > page 403
            if (!$this->checkCSRFToken()) {
                http_response_code(403);
                $this->show('error/err403');
                die;
            }

        }
    }

    protected function generateCSRFToken()
    {
        // binaire to heximal (chaine de caractères aléatoire de 32 octets soit 64 caracs (1 octet = 2 caracs))
        return bin2hex(random_bytes(32));
    }

    // vérifie si le formulaire a bien un token
    protected function checkCSRFToken()
    {
        return isset($_POST['_token']) && $_POST['_token'] === $_SESSION['_token'];
    }

    
    /**
     * Méthode permettant d'afficher du code HTML en se basant sur les views
     *
     * @param string $viewName Nom du fichier de vue
     * @param array $viewData Tableau des données à transmettre aux vues
     * @return void
     */
    protected function show(string $viewName, $viewData = [])
    {
        // On globalise $router car on ne sait pas faire mieux pour l'instant
        global $router;

        // Comme $viewData est déclarée comme paramètre de la méthode show()
        // les vues y ont accès
        // ici une valeur dont on a besoin sur TOUTES les vues
        // donc on la définit dans show()
        $viewData['currentPage'] = $viewName;

        // définir l'url absolue pour nos assets
        $viewData['assetsBaseUri'] = $_SERVER['BASE_URI'] . 'assets/';
        // définir l'url absolue pour la racine du site
        // /!\ != racine projet, ici on parle du répertoire public/
        $viewData['baseUri'] = $_SERVER['BASE_URI'];

        // On veut désormais accéder aux données de $viewData, mais sans accéder au tableau
        // La fonction extract permet de créer une variable pour chaque élément du tableau passé en argument
        extract($viewData);
        // => la variable $currentPage existe désormais, et sa valeur est $viewName
        // => la variable $assetsBaseUri existe désormais, et sa valeur est $_SERVER['BASE_URI'] . '/assets/'
        // => la variable $baseUri existe désormais, et sa valeur est $_SERVER['BASE_URI']
        // => il en va de même pour chaque élément du tableau

        // $viewData est disponible dans chaque fichier de vue
        require_once __DIR__ . '/../views/layout/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/layout/footer.tpl.php';
    }

    public function checkAuthorization($roles = [])
    {
        global $router;

        // Si l'utilisateur est connecté
        if (isset($_SESSION['userId'])) {
            // Alors on récupère ses infos et son rôle
            $user = $_SESSION['userObject'];
            $role = $user->getRole();
            // Si son rôle est autorisé à faire l'action qu'il tente d'effectuer
            if (in_array($role, $roles)) {
                return true;
            }
            // Sinon on envoi une erreur HTTP 403
            http_response_code(403);
            $this->show('error/err403');
            die;
        }

        // Sinon on le redirige vers le formulaire de connexion
        header('Location: ' . $router->generate('user-login'));
        die;
    }
    
}
