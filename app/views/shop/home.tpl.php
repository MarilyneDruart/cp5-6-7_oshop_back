<a href="<?= $router->generate('main-home') ?>" class="btn btn-success float-end">Retour</a>
<h2>Gestion de la page d'accueil</h2>

<form action="<?= $router->generate('shop-home-edit') ?>" method="POST" class="mt-5">
    <?php include __DIR__ . '/../partials/errors.tpl.php'; ?>
    <?php require __DIR__ . '/../partials/csrf_input.tpl.php'; ?>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="emplacement1">Emplacement #1</label>
                <select class="form-control" id="emplacement1" name="emplacement[]">
                    <option value="">choisissez :</option>
                    <option value="1" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 1) ? 'selected' : '' ?>>Détente</option>
                    <option value="2" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 2) ? 'selected' : '' ?>>Au travail</option>
                    <option value="3" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 3) ? 'selected' : '' ?>>Cérémonie</option>
                    <option value="4" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 4) ? 'selected' : '' ?>>Sortir</option>
                    <option value="5" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 5) ? 'selected' : '' ?>>Vintage</option>
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="emplacement2">Emplacement #2</label>
                <select class="form-control" id="emplacement2" name="emplacement[]">
                    <option value="">choisissez :</option>
                    <option value="1" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 1) ? 'selected' : '' ?>>Détente</option>
                    <option value="2" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 2) ? 'selected' : '' ?>>Au travail</option>
                    <option value="3" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 3) ? 'selected' : '' ?>>Cérémonie</option>
                    <option value="4" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 4) ? 'selected' : '' ?>>Sortir</option>
                    <option value="5" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 5) ? 'selected' : '' ?>>Vintage</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="emplacement3">Emplacement #3</label>
                <select class="form-control" id="emplacement3" name="emplacement[]">
                    <option value="">choisissez :</option>
                    <option value="1" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 1) ? 'selected' : '' ?>>Détente</option>
                    <option value="2" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 2) ? 'selected' : '' ?>>Au travail</option>
                    <option value="3" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 3) ? 'selected' : '' ?>>Cérémonie</option>
                    <option value="4" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 4) ? 'selected' : '' ?>>Sortir</option>
                    <option value="5" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 5) ? 'selected' : '' ?>>Vintage</option>
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="emplacement4">Emplacement #4</label>
                <select class="form-control" id="emplacement4" name="emplacement[]">
                    <option value="">choisissez :</option>
                    <option value="1" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 1) ? 'selected' : '' ?>>Détente</option>
                    <option value="2" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 2) ? 'selected' : '' ?>>Au travail</option>
                    <option value="3" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 3) ? 'selected' : '' ?>>Cérémonie</option>
                    <option value="4" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 4) ? 'selected' : '' ?>>Sortir</option>
                    <option value="5" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 5) ? 'selected' : '' ?>>Vintage</option>
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="emplacement5">Emplacement #5</label>
                <select class="form-control" id="emplacement5" name="emplacement[]">
                    <option value="">choisissez :</option>
                    <option value="1" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 1) ? 'selected' : '' ?>>Détente</option>
                    <option value="2" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 2) ? 'selected' : '' ?>>Au travail</option>
                    <option value="3" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 3) ? 'selected' : '' ?>>Cérémonie</option>
                    <option value="4" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 4) ? 'selected' : '' ?>>Sortir</option>
                    <option value="5" <?= (isset($_POST['emplacement[]']) && $_POST['emplacement[]'] == 5) ? 'selected' : '' ?>>Vintage</option>
                </select>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
</form>*rme;hà