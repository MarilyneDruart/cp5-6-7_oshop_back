        <a href="<?= $router->generate('category-list') ?>" class="btn btn-success float-end">Retour</a>
        <h2>Ajouter une catégorie</h2>
        
        <form action="<?= $router->generate('category-create') ?> " method="POST" class="mt-5">
            <!-- si le tableau errors existe on va pouvoir afficher les erreurs dans ul -->
            <?php if (isset($errors)) : ?>
                <ul class="alert alert-danger list-unstyled">
                    <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <!--on ajoute name="" pour que le $_POST trouve la donnée saisie dans le champs et value="" pour garder la donnée saisie à la validation du formulaire -->
                <input type="text" class="form-control" id="name" name="categName" value="<?= $_POST['categName'] ?? '' ?>" placeholder="Nom de la catégorie">
            </div>
            <div class="mb-3">
                <label for="subtitle" class="form-label">Sous-titre</label>
                <input type="text" class="form-control" id="subtitle" name="categSubtitle" value="<?= $_POST['categSubtitle'] ?? '' ?>" placeholder="Sous-titre" aria-describedby="subtitleHelpBlock">
                <small id="subtitleHelpBlock" class="form-text text-muted">
                    Sera affiché sur la page d'accueil comme bouton devant l'image
                </small>
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Image</label>
                <input type="text" class="form-control" id="picture" name="categPicture" value="<?= $_POST['categPicture'] ?? '' ?>" placeholder="image jpg, gif, svg, png" aria-describedby="pictureHelpBlock">
                <small id="pictureHelpBlock" class="form-text text-muted">
                    URL relative d'une image (jpg, gif, svg ou png) fournie sur <a href="https://benoclock.github.io/S06-images/" target="_blank">cette page</a>
                </small>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary mt-5">Valider</button>
            </div>
        </form>
 