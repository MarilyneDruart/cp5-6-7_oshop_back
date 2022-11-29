<h2 class="text-center">Se connecter</h2>

<form action="<?= $router->generate('user-login-post') ?>" method='post'>
    <div>
        <label for="email" class="form-label">Email :</label>
        <input type="text" class="form-control" id="email" name="email" value="<?= $_POST['email'] ?? '' ?>" placeholder="Email">
    </div>
    <div>
        <label for="password" class="form-label">Password :</label>
        <input type="password" class="form-control" id="password" name="password" value="<?= $_POST['password'] ?? '' ?>" placeholder="Password">
    </div>
    <div>
        <button type="submit" class="btn btn-primary mt-5">Se connecter</button>
    </div>
</form>