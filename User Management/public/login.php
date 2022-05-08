<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/login.php';
?>

<?php view('header', ['title' => 'Login']) ?>




    <form action="login.php" method="post"  class="container" style="width: 450px;">
        <br><br><br><br>
        <h1>Login</h1>
        <div class="mb-3 mt-3">
            <label for="username" class="form-label">Enter Your Username:</label>
            <input type="text" name="username" id="username" value="<?= $inputs['username'] ?? '' ?>" class="form-control" autocomplete="off" required>
            <small><?= $errors['username'] ?? '' ?></small>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Enter Your Password:</label>
            <input type="password" name="password" id="password" class="form-control" autocomplete="off" required>
            <small><?= $errors['password'] ?? '' ?></small>
        </div>

        <?php if (isset($errors['login'])) : ?>
            <div class="alert alert-error">
                <span style="color:red;"> <?= $errors['login'] ?> </span>
            </div>
        <?php endif ?>


        <section>
            <button type="submit" class="btn btn-primary">Login</button> <br><br>
        </section>
    </form>

<?php view('footer') ?>

