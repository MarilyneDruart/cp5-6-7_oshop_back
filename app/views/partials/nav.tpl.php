<nav>
    <ul>
        <li><a href="<?= $router->generate('main-home') ?>">Accueil</a></li>
        <li><a href="<?= $router->generate('category-list') ?>">Liste des catégories</a></li>
        <li><a href="<?= $router->generate('category-add') ?>">Ajout de catégories</a></li>
        <li><a href="<?= $router->generate('products-list') ?>">Liste des produits</a></li>
        <li><a href="<?= $router->generate('products-add') ?>">Ajout de produits</a></li>
        <li><a href="<?= md5(time()) ?>">404</a></li>
    </ul>
</nav>