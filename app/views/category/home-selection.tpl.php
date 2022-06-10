<form action="<?php $router->generate('category-home-selection-post') ?>" method="POST" class="mt-5">
    <?php include __DIR__ . '/../partials/errors.tpl.php'; ?>
    <?php require __DIR__ . '/../partials/csrf_input.tpl.php'; ?>
    <div class="row">
        <?php for ($i = 0; $i < 5; $i++) : ?>
        <div class="col">
            <div class="form-group">
                <label for="emplacement<?= $i + 1 ?>">Emplacement #<?= $i + 1 ?></label>
                <select class="form-select" id="emplacement<?= $i + 1 ?>" name="emplacement[]">
                    <option value="">choisissez :</option>
                    <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category->getId() ?>" <?= isset($_POST['emplacement'][$i]) ? (
                        $_POST['emplacement'][$i] == $category->getId() ? 'selected' : ''
                    ) : (
                        $category->getHomeOrder() == ($i + 1) ? 'selected' : ''
                    ) ?>><?= $category->getName() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <?php endfor; ?>
    </div>
    <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
</form>
