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
    <?php include 'partials/nav.php'; ?>
    <?php include 'partials/header.php'; ?>


    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <form action="">
                <select id="country" name="country" autocomplete="country-name"
                        class="lu tn adu afa alp arp bag bbm bbs bbw bdn bnd bne bnp cia cic dnu">
                    <option>United States</option>
                    <option>Canada</option>
                    <option>Mexico</option>
                </select>
            </form>
        </div>
    </main>


</div>
</body>
</html>