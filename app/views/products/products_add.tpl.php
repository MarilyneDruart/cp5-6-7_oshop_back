        <a href="<?= $router->generate('products-list') ?>" class="btn btn-success float-end">Retour</a>
        <h2>Ajouter un produit</h2>
    
        <form action="<?= $router->generate('products-create') ?>" method="POST" class="mt-5">
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="prodName" value="<?= $_POST['prodName'] ?? '' ?>" placeholder="Nom du produit">
            </div>
            <div class="mb-3">
                <label for="subtitle" class="form-label">Description</label>
                <input type="text" class="form-control" id="subtitle" name="prodDescript" value="<?= $_POST['prodDescript'] ?? '' ?>" placeholder="Description" aria-describedby="subtitleHelpBlock">
                </small>
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Image</label>
                <input type="text" class="form-control" id="picture" name="prodPicture" value="<?= $_POST['prodPicture'] ?? '' ?>" placeholder="image jpg, gif, svg, png" aria-describedby="pictureHelpBlock">
                <small id="pictureHelpBlock" class="form-text text-muted">
                    URL relative d'une image (jpg, gif, svg ou png) fournie sur <a href="https://benoclock.github.io/S06-images/" target="_blank">cette page</a>
                </small>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prix</label>
                <input type="text" class="form-control" id="price" name="prodPrice" value="<?= $_POST['prodPrice'] ?? '' ?>" cplaceholder="Prix du produit">
            </div>
            <div class="mb-3">
                <label for="status">Statut</label>
                <select class="custom-select" id="status" name="prodStatus">
                    <option>--</option>
                    <option value="1" <?= (isset($_POST['status']) && $_POST['status'] == 1) ? 'selected' : '' ?>>Actif</option>
                    <option value="2" <?= (isset($_POST['status']) && $_POST['status'] == 2) ? 'selected' : '' ?>>Inactif</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="category">Catégorie</label>
                <select class="custom-select" id="category" name="prodCategory">
                    <option>--</option>
                    <option value="1">Détente</option>
                    <option value="2">Au travail</option>
                    <option value="3">Cérémonie</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="brand">Marque</label>
                <select name="prodBrand" class="custom-select" id="brand">
                    <option>--</option>
                    <option value="1">oCirage</option>
                    <option value="2">BOOTstrap</option>
                    <option value="3">Talonette</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="type">Type</label>
                <select name="prodType" class="custom-select" id="type">
                    <option>--</option>
                    <option value="1">Chaussures de ville</option>
                    <option value="2">Chaussures de sport</option>
                    <option value="3">Tongs</option>
                </select>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary mt-5">Valider</button>
            </div>
        </form>
