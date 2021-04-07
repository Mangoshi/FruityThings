<?php require_once '../../config.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create Product</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300&family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/edca80fe33.js" crossorigin="anonymous"></script>

    <!-- Stylesheets -->
    <link href="<?= APP_URL ?>/assets/css/form.css" rel="stylesheet">
    <link href="<?= APP_URL ?>/assets/css/style.css" rel="stylesheet">

</head>
<body>
<div class="grid">
    <header>
        <?php require 'include/navbar.php'; ?>
    </header>
    <?php require 'include/flash.php'; ?>
    <div class="formContainer f--jet">

        <form class="form" method="post" action="<?= APP_URL ?>actions/product-store.php" enctype="multipart/form-data" id="addProductForm">
            <label for="form" class="form-heading">Create Product</label>
            <label for="title" class="form-label"><strong>Title</strong></label>
            <div class="form-field">
                <input class="f--source" type="text" name="title" id="title" value="<?= old('title') ?>"/>
                <span class="error"><?= error("title") ?></span>
            </div>

            <label for="description" class="form-label"><strong>Description</strong></label>
            <div class="form-field">
                <textarea class="f--source" name="description" id="description" rows="3"><?= old('description') ?></textarea>
                <span class="error"><?= error("description") ?></span>
            </div>

            <label for="price" class="form-label"><strong>Price</strong></label>
            <div class="form-field">
                <input class="f--source" type="number" name="price" id="price" min="1" step="0.01" value="<?= old('price') ?>"/>
                <span class="error"><?= error("price") ?></span>
            </div>

            <label for="age_rating" class="form-label"><strong>Age Rating</strong></label>
            <div class="form-field">
                <select class="f--source" name="age_rating" id="age_rating">
                    <option value="3+">3+</option>
                    <option value="7+">7+</option>
                    <option value="13+">13+</option>
                    <option value="18+">18+</option>
                </select>
                <span class="error"><?= error("age_rating") ?></span>
            </div>

            <label for="average_rating" class="form-label"><strong>Average Rating</strong></label>
            <div class="form-field">
                <select class="f--source" name="average_rating" id="average_rating">
                    <option value="Overwhelmingly Positive">Overwhelmingly Positive</option>
                    <option value="Very Positive">Very Positive</option>
                    <option value="Positive">Positive</option>
                    <option value="Mostly Positive">Mostly Positive</option>
                    <option value="Mixed">Mixed</option>
                    <option value="Mostly Negative">Mostly Negative</option>
                    <option value="Negative">Negative</option>
                    <option value="Very Negative">Very Negative</option>
                    <option value="Overwhelmingly Negative">Overwhelmingly Negative</option>
                </select>
                <span class="error"><?= error("average_rating") ?></span>
            </div>

            <label for="release_date" class="form-label"><strong>Release Date</strong></label>
            <div class="form-field">
                <input class="f--source" type="date" name="release_date" id="release_date" value="<?= old('release_date') ?>"/>
                <span class="error"><?= error("release_date") ?></span>
            </div>

            <label><strong>Platforms</strong></label><br>
            <label for="on_windows" class="form-label">Windows?</label>
            <div class="form-group">
                <input class="f--source" type="checkbox" name="on_windows" id="on_windows" value="1"/>
                <span class="error"><?= error("on_windows") ?></span>
            </div>
            <label for="on_linux" class="form-label">Linux?</label>
            <div class="form-group">
                <input class="f--source" type="checkbox" name="on_linux" id="on_linux" value="1"/>
                <span class="error"><?= error("on_linux") ?></span>
            </div>
            <label for="on_mac" class="form-label">Mac?</label>
            <div class="form-group">
                <input class="f--source" type="checkbox" name="on_mac" id="on_mac" value="1"/>
                <span class="error"><?= error("on_mac") ?></span>
            </div>

            <label for="developer" class="form-label"><strong>Developer</strong></label>
            <div class="form-field">
                <input class="f--source" type="text" name="developer" id="developer" value="<?= old('developer') ?>"/>
                <span class="error"><?= error("developer") ?></span>
            </div>

            <label for="publisher" class="form-label"><strong>Publisher</strong></label>
            <div class="form-field">
                <input class="f--source" type="text" name="publisher" id="publisher" value="<?= old('publisher') ?>"/>
                <span class="error"><?= error("publisher") ?></span>
            </div>

            <label for="genre_id" class="form-label"><strong>Genre</strong></label>
            <div class="form-field">
                <select class="f--source" name="genre_id" id="genre_id">
                    <option value="1">Action RPG</option>
                    <option value="2">Roguelike</option>
                </select>
            </div>

            <label for="product_image" class="form-label"><strong>Product Image</strong></label>
            <div class="form-field imageInput">
                <input class="f--source" type="file" name="product_image" id="product_image"/>
                <span class="error"><?= error("product_image") ?></span>
            </div>

            <div class="form-field mt-3">
                <button class="formSubmitButton" id="formSubmitButton" type="submit"><i class="far fa-plus-square"></i> STORE <i class="far fa-plus-square"></i></button>
                <br><br>
                <a class="formCancelButton" href="<?= APP_URL ?>views/admin/home.php">Cancel</a>
            </div>
        </form>
    </div>
</div>
<script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
<script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
