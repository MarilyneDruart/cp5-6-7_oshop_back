<a href="<?= $router->generate('product-list') ?>" class="btn btn-success float-end">Retour</a>
        <h2>Modifier le produit #<?= $product->getId() ?></h2>

        <form action="<?= $router->generate('product-update', ['id' => $product->getId()]) ?>" method="POST" class="mt-5">
            <?php include __DIR__ . '/../partials/errors.tpl.php'; ?>
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $_POST['name'] ?? $product->getName() ?>" placeholder="Nom du produit">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="<?= $_POST['description'] ?? $product->getDescription() ?>" placeholder="Description">
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Image</label>
                <input type="text" class="form-control" id="picture" name="picture" value="<?= $_POST['picture'] ?? $product->getPicture() ?>" placeholder="image jpg, gif, svg, png" aria-describedby="pictureHelpBlock">
                <small id="pictureHelpBlock" class="form-text text-muted">
                    URL relative d'une image (jpg, gif, svg ou png) fournie sur <a href="https://benoclock.github.io/S06-images/" target="_blank">cette page</a>
                </small>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prix</label>
                <input type="text" class="form-control" id="price" name="price" value="<?= $_POST['price'] ?? $product->getPrice() ?>" placeholder="Prix du produit">
            </div>
            <div class="mb-3">
                <label for="status">Statut</label>
                <select class="custom-select" id="status" name="status">
                    <option>--</option>
                    <!-- En 2 temps, on vérifie d'abord l'existence de $_POST['status'] pour savoir si c'est elle qu'on doit prendre en compte pour la sélection de l'option ou bien la valeur qui est en BDD -->
                    <option value="1" <?= isset($_POST['status']) ? (
                        $_POST['status'] == 1 ? 'selected' : ''
                    ) : (
                        $product->getStatus() == 1 ? 'selected' : ''
                    ) ?>>Actif</option>
                    <option value="2" <?= isset($_POST['status']) ? (
                        $_POST['status'] == 2 ? 'selected' : ''
                    ) : (
                        $product->getStatus() == 2 ? 'selected' : ''
                    ) ?>>Inactif</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="category">Catégorie</label>
                <select class="custom-select" id="category" name="category">
                    <?php foreach ($categories as $key => $category) : ?>
                    <?php if ($key === 0) : ?><option>--</option><?php endif; ?>
                    <option value="<?= $category->getId() ?>" <?= isset($_POST['category']) ? (
                        $_POST['category'] == $category->getId() ? 'selected' : ''
                    ) : (
                        $product->getCategoryId() == $category->getId() ? 'selected' : ''
                    ) ?>><?= $category->getName() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="brand">Marque</label>
                <select class="custom-select" id="brand" name="brand">
                    <?php foreach ($brands as $key => $brand) : ?>
                    <?php if ($key === 0) : ?><option>--</option><?php endif; ?>
                    <option value="<?= $brand->getId() ?>" <?= isset($_POST['brand']) ? (
                        $_POST['brand'] == $brand->getId() ? 'selected' : ''
                    ) : (
                        $product->getBrandId() == $brand->getId() ? 'selected' : ''
                    ) ?>><?= $brand->getName() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="type">Type</label>
                <select class="custom-select" id="type" name="type">
                    <?php foreach ($types as $key => $type) : ?>
                    <?php if ($key === 0) : ?><option>--</option><?php endif; ?>
                    <option value="<?= $type->getId() ?>" <?= isset($_POST['type']) ? (
                        $_POST['type'] == $type->getId() ? 'selected' : ''
                    ) : (
                        $product->getTypeId() == $type->getId() ? 'selected' : ''
                    ) ?>><?= $type->getName() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary mt-5">Valider</button>
            </div>
        </form>
