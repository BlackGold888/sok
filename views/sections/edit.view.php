<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
    <div class="container">
        <div class="section-update">
            <form action="/section/update" method="POST">
                <input type="hidden" name="id" value="<?= $section['id'] ?>">
                <input type="hidden" name="_method" value="PATCH">

                <label>Section Name</label>
                <input type="text" name="name" value="<?= $section['name'] ?>" required>
                <label>Section description</label>
                <textarea name="description" cols="20" rows="5" required
                          maxlength="500"><?= $section['description'] ?></textarea>

                <?php if (isset($errors['name'])): ?>
                    <p><?= $errors['name'] ?></p>
                <?php endif; ?>
                <?php if (isset($errors['description'])): ?>
                    <p><?= $errors['description'] ?></p>
                <?php endif; ?>

                <button type="submit">Update</button>
                <a href="/" class="btn">back</a>
            </form>
        </div>
    </div>
<?php require base_path('views/partials/footer.php'); ?>

