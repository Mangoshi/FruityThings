<?php require_once '../../config.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create Product</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"/>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="<?= APP_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?= APP_URL ?>/assets/css/mystyle.css" rel="stylesheet">
    <link href="<?= APP_URL ?>/assets/css/form.css" rel="stylesheet">

</head>
<body>
<div class="container">
    <?php require 'include/navbar.php'; ?>
    <?php require 'include/flash.php'; ?>
    <main role="main" class="mt-5">
        <div class="pt-5">
            <h3>Create Product</h3>
            <form method="post" action="<?= APP_URL ?>actions/product-store.php" enctype="multipart/form-data">

                <label for="title" class="mt-2">Title</label>
                <div class="form-field">
                    <input type="text" name="title" id="title" value="<?= old('title') ?>"/>
                    <span class="error"><?= error("title") ?></span>
                </div>

                <label for="description" class="mt-2">Description</label>
                <div class="form-field">
                    <textarea name="description" id="description" rows="3"><?= old('description') ?></textarea>
                    <span class="error"><?= error("description") ?></span>
                </div>

                <label for="location" class="mt-2">Price</label>
                <div class="form-field">
                    <input type="number" name="price" id="price" min="1" step="0.01" value="<?= old('price') ?>"/>
                    <span class="error"><?= error("price") ?></span>
                </div>

                <label for="age_rating" class="mt-2">Age Rating</label>
                <div class="form-field">
                    <select name="age_rating" id="age_rating">
                        <option value="3+">3+</option>
                        <option value="7+">7+</option>
                        <option value="13+">13+</option>
                        <option value="18+">18+</option>
                    </select>
                    <span class="error"><?= error("age_rating") ?></span>
                </div>

                <label for="average_rating" class="mt-2">Average Rating</label>
                <div class="form-field">
                    <select name="average_rating" id="average_rating">
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

                <label for="release_date" class="mt-2">Release Date</label>
                <div class="form-field">
                    <input type="date" name="release_date" id="release_date" value="<?= old('release_date') ?>"/>
                    <span class="error"><?= error("release_date") ?></span>
                </div>

                <label>Available on...</label>
                <div class="form-group">
                    <label for="on_windows" class="mt-2">Windows?</label>
                    <input type="checkbox" name="on_windows" id="on_windows" value="1"/>
                    <span class="error"><?= error("on_windows") ?></span>

                    <label for="on_linux" class="mt-2">Linux?</label>
                    <input type="checkbox" name="on_linux" id="on_linux" value="1"/>
                    <span class="error"><?= error("on_linux") ?></span>

                    <label for="on_mac" class="mt-2">Mac?</label>
                    <input type="checkbox" name="on_mac" id="on_mac" value="1"/>
                    <span class="error"><?= error("on_mac") ?></span>
                </div>

                <label for="developer" class="mt-2">Developer</label>
                <div class="form-field">
                    <input type="text" name="developer" id="developer" value="<?= old('developer') ?>"/>
                    <span class="error"><?= error("developer") ?></span>
                </div>

                <label for="publisher" class="mt-2">Publisher</label>
                <div class="form-field">
                    <input type="text" name="publisher" id="publisher" value="<?= old('publisher') ?>"/>
                    <span class="error"><?= error("publisher") ?></span>
                </div>

                <label for="genre_id" class="mt-2">Genre</label>
                <div class="form-field">
                    <select name="genre_id" id="genre_id">
                        <option value="1">Action RPG</option>
                        <option value="2">Roguelike</option>
                    </select>
                </div>

                <label for="product_image" class="mt-2">Product Image</label>
                <div class="form-field">
                    <input type="file" name="product_image" id="product_image"/>
                    <span class="error"><?= error("product_image") ?></span>
                </div>

                <div class="form-field mt-3">
                    <button id="submitButton" type="submit"><span class="material-icons">add</span> STORE</button>
                    <br><br>
                    <a href="<?= APP_URL ?>views/admin/home.php">Cancel</a>
                </div>
            </form>
        </div>
    </main>
</div>
<script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
<script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
