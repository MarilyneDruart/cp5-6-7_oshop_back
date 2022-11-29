        <a href="<?= $router->generate('category-list') ?>" class="btn btn-success float-end">Retour</a>
        <h2>Ajouter une catégorie</h2>

        <form action="<?= $router->generate('category-create') ?>" method="POST" class="mt-5">
            <?php include __DIR__ . '/../partials/errors.tpl.php'; ?>
            <?php require __DIR__ . '/../partials/csrf_input.tpl.php'; ?>
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $_POST['name'] ?? '' ?>" placeholder="Nom de la catégorie">
            </div>
            <div class="mb-3">
                <label for="subtitle" class="form-label">Sous-titre</label>
                <input type="text" class="form-control" id="subtitle" name="subtitle" value="<?= $_POST['subtitle'] ?? '' ?>" placeholder="Sous-titre" aria-describedby="subtitleHelpBlock">
                <small id="subtitleHelpBlock" class="form-text text-muted">
                    Sera affiché sur la page d'accueil comme bouton devant l'image
                </small>
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Image</label>
                <input type="text" class="form-control" id="picture" name="picture" value="<?= $_POST['picture'] ?? '' ?>" placeholder="image jpg, gif, svg, png" aria-describedby="pictureHelpBlock">
                <small id="pictureHelpBlock" class="form-text text-muted">
                    URL relative d'une image (jpg, gif, svg ou png) fournie sur <a href="https://benoclock.github.io/S06-images/" target="_blank">cette page</a>
                </small>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary mt-5">Valider</button>
            </div>
        </form>
