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

                    <?php foreach ($categories as $key => $category) : ?>

                        <?php if ($key === 0) : ?>
                            <option>--</option>
                        <?php endif; ?>
                        
                        <option value="<?= $category->getHomeOrder() ?>" <?= isset($_POST['category']) ? (
                                $_POST['category'] == $category->getId() ? 'selected' : ''
                            ) : (
                                $category->getHomeOrder() == 1 ? 'selected' : ''
                            ) ?>><?= $category->getName() ?>
                        </option>
                        
                    <?php endforeach; ?>

                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="emplacement2">Emplacement #2</label>
                <select class="form-control" id="emplacement2" name="emplacement[]">

                    <?php foreach ($categories as $key => $category) : ?>

                        <?php if ($key === 0) : ?>
                            <option>--</option>
                        <?php endif; ?>

                        <option value="<?= $category->getHomeOrder() ?>" <?= isset($_POST['category']) ? (
                                $_POST['category'] == $category->getId() ? 'selected' : ''
                            ) : (
                                $category->getHomeOrder() == 2 ? 'selected' : ''
                            ) ?>><?= $category->getName() ?>
                        </option>

                        <?php endforeach; ?>

                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="emplacement3">Emplacement #3</label>
                <select class="form-control" id="emplacement3" name="emplacement[]">
                   
                    <?php foreach ($categories as $key => $category) : ?>

                        <?php if ($key === 0) : ?>
                            <option>--</option>
                        <?php endif; ?>

                        <option value="<?= $category->getHomeOrder() ?>" <?= isset($_POST['category']) ? (
                                $_POST['category'] == $category->getId() ? 'selected' : ''
                            ) : (
                                $category->getHomeOrder() == 3 ? 'selected' : ''
                            ) ?>><?= $category->getName() ?>
                        </option>

                    <?php endforeach; ?>

                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="emplacement4">Emplacement #4</label>
                <select class="form-control" id="emplacement4" name="emplacement[]">
                   
                    <?php foreach ($categories as $key => $category) : ?>

                        <?php if ($key === 0) : ?>
                            <option>--</option>
                        <?php endif; ?>

                        <option value="<?= $category->getHomeOrder() ?>" <?= isset($_POST['category']) ? (
                                $_POST['category'] == $category->getId() ? 'selected' : ''
                            ) : (
                                $category->getHomeOrder() == 4 ? 'selected' : ''
                            ) ?>><?= $category->getName() ?>
                        </option>

                    <?php endforeach; ?>

                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="emplacement5">Emplacement #5</label>
                <select class="form-control" id="emplacement5" name="emplacement[]">
                   
                <?php foreach ($categories as $key => $category) : ?>

                    <?php if ($key === 0) : ?>
                        <option>--</option>
                    <?php endif; ?>

                    <option value="<?= $category->getHomeOrder() ?>" <?= isset($_POST['category']) ? (
                            $_POST['category'] == $category->getId() ? 'selected' : ''
                        ) : (
                            $category->getHomeOrder() == 5 ? 'selected' : ''
                        ) ?>><?= $category->getName() ?>
                    </option>

                <?php endforeach; ?>

                </select>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
</form>