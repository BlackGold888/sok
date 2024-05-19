<?php require base_path('/views/partials/head.php'); ?>
<?php require base_path('/views/partials/nav.php'); ?>
    <div class="container">
        <div class="section-update">
            <form action="/section/store" method="POST">
                <label>Parent Id</label>
                <select name="parent_id">
                    <option value=""></option>
                    <?php foreach ($sections as $section): ?>
                        <option value="<?= $section['id'] ?>"><?= $section['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <label>Section Name</label>
                <input type="text" name="name" required>
                <label>Section description</label>
                <textarea name="description" cols="20" rows="5" required
                          maxlength="500"></textarea>

                <?php if (isset($errors['name'])): ?>
                    <div>
                        <?php foreach ($errors['name'] as $error): ?>
                            <p><?= $error ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($errors['description'])): ?>
                    <div>
                        <?php foreach ($errors['description'] as $error): ?>
                            <p><?= $error ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <button type="submit">Add</button>
                <a href="/" class="btn">back</a>
            </form>
        </div>
    </div>
<?php require base_path('views/partials/footer.php'); ?>
