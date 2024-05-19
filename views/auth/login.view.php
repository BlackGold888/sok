<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
</head>
<body class="h-full">
<div class="min-h-full">
    <?php require base_path('views/partials/nav.php'); ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <form action="/login" method="POST">
                <label>
                    Username
                    <input type="text" name="username">
                </label><br>
                <label>
                    Password
                    <input type="password" name="password">
                </label><br>

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
    </main>


</div>
</body>
</html>