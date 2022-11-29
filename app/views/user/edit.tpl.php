<a href="<?= $router->generate('user-list') ?>" class="btn btn-success float-end">Retour</a>
        <h2>Ajouter un utilisateur</h2>
        <h6>Les champs maqués d'une * sont obligatoires</h6>

        <form action="<?= $router->generate('user-create') ?>" method="POST" class="mt-5">
            <?php include __DIR__ . '/../partials/errors.tpl.php'; ?>
            <?php require __DIR__ . '/../partials/csrf_input.tpl.php'; ?>
            <input type="hidden" name="_token" value="<?= $_SESSION['_token'] ?>">
            <div class="mb-3">
                <label for="email" class="form-label">Email*</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $_POST['email'] ?? '' ?>" placeholder="Adresse mail">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe*</label>
                <input type="password" class="form-control" id="password" name="password" value="<?= $_POST['password'] ?? '' ?>" placeholder="Mot de passe">
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $_POST['firstname'] ?? '' ?>" placeholder="Prénom">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Nom</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $_POST['lastname'] ?? '' ?>" placeholder="Nom">
            </div>
            <div class="mb-3">
                <label for="role">Rôle*</label>
                <select class="custom-select" id="role" name="role">
                    <option>--</option>
                    <option value="catalog-manager" <?= (isset($_POST['role']) && $_POST['role'] == 'catalog-manager') ? 'selected' : '' ?>>Gestionnaire du catalogue</option>
                    <option value="admin" <?= (isset($_POST['role']) && $_POST['role'] == 'admin') ? 'selected' : '' ?>>Administrateur</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="status">Statut*</label>
                <select class="custom-select" id="status" name="status">
                    <option>--</option>
                    <option value="1" <?= (isset($_POST['status']) && $_POST['status'] == 1) ? 'selected' : '' ?>>Actif</option>
                    <option value="2" <?= (isset($_POST['status']) && $_POST['status'] == 2) ? 'selected' : '' ?>>Désactivé</option>
                </select>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary mt-5">Valider</button>
            </div>
        </form>
