<?php include 'partials/head.php'; ?>
<?php include 'partials/nav.php'; ?>
<div class="container">
    <div class="box">
        <h1>Dashboard</h1>
        <p>Welcome to the dashboard <?=$name?></p>
        <a class="btn" href="/section/add">Add section</a>
    </div>

    <p>All sections</p>

    <div class="sections">
        <?php displaySections($sections); ?>
    </div>
</div>
<?php include 'partials/footer.php'; ?>
