<?php if (isset($errors)) : ?>
    <ul class="alert alert-danger list-unstyled">
        <?php foreach ($errors as $error) : ?>
        <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
