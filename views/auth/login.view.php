<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<div class="container">
    <div class="login-form">
        <form action="/login" method="POST">
            <label>Username</label>
            <input type="text" name="username" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <?php if (isset($errors['username'])): ?>
                <div>
                    <?php foreach ($errors['username'] as $error): ?>
                        <p><?= $error ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if (isset($errors['password'])): ?>
                <div>
                    <?php foreach ($errors['password'] as $error): ?>
                        <p><?= $error ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>


            <button type="submit">Login</button>
        </form>
    </div>
</div>
<?php require base_path('views/partials/footer.php'); ?>