<?php require_once 'config.php'; ?>
<?php

use BookWorms\Model\Product;
use BookWorms\Model\Genre;
use BookWorms\Model\Image;

$products = Product::findAll();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Welcome to FruityThings</title>

    <link href="<?= APP_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?= APP_URL ?>/assets/css/template.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <?php require 'include/header.php'; ?>
    <?php require 'include/navbar.php'; ?>
    <?php require 'include/flash.php'; ?>
    <main role="main">
        <div>
            <h1>Welcome to FruityThings</h1>
            <p class="lead">
                Pellentesque orci dui, consectetur non nisi vitae, imperdiet condimentum
                neque.
            </p>
            <p>
                Cras ullamcorper arcu eget dui consectetur interdum. Cras ac ex ut
                odio sollicitudin ultrices. Nam dapibus mi dictum tellus dignissim ornare.
                Quisque scelerisque tellus eu nunc rhoncus aliquet et et quam. Etiam id
                pretium purus. Aliquam ullamcorper, sapien vitae tempor vulputate, lacus
                ante sollicitudin leo, nec tempus lacus felis vitae nisi.
            </p>
            <div class="container">
                <div>
                    <h2 class="rowHeading mt-4 mb-2" id="closestFestivals">Products</h2>
                    <div class="row">
                        <?php foreach ($products as $product) { ?>
                            <div class="col-4 mb-4">
                                <div class="card myCard imageCard shadow-sm">
                                    <a href="#" class="lato-light cardTitle">
                                        <?= $product->title ?>
                                    <li class="list-group-item">
                                        <?php
                                        try {
                                            $image = Image::findById($product->image_id);
                                        } catch (Exception $e) {
                                        }
                                        if ($image !== null){
                                            ?>
                                            <img src="<?= APP_URL . "actions/" . $image->filename ?>" width="150px" alt="image" />
                                            <?php
                                        }
                                        ?>
                                    </a>
                                    </li>
                                    <div class="card-body">
                                        <p class="card-text"><?= get_words($product->description, 20) ?></p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <small> Price: </small> <span
                                                    class="text-muted"><?= $product->price ?></span>
                                        </li>
                                        <li class="list-group-item">
                                            <small> Age rating: </small> <span
                                                    class="text-muted"><?= $product->age_rating ?></span>
                                        </li>
                                        <li class="list-group-item">
                                            <small> Average rating: </small><span
                                                    class="text-muted"><?= $product->average_rating ?></span>
                                        </li>
                                        <li class="list-group-item">
                                            <small> Release date: </small><span
                                                    class="text-muted"><?= $product->release_date ?></span>
                                        </li>

                                        <li class="list-group-item">
                                            <small> Platforms: </small>
                                            <?php if($product->on_windows == 1){?> <small>Windows</small> <?php };?>

                                            <?php if($product->on_linux == 1){?> <small>Linux</small> <?php };?>

                                            <?php if($product->on_mac == 1){?> <small>Mac</small> <?php };?>
                                        </li>

                                        <li class="list-group-item">
                                            <small> Developer: </small><span
                                                    class="text-muted"><?= $product->developer ?></span>
                                        </li>
                                        <li class="list-group-item">
                                            <small> Publisher: </small><span
                                                    class="text-muted"><?= $product->publisher ?></span>
                                        </li>
                                        <li class="list-group-item">
                                            <small> Genre: </small><span
                                                    class="text-muted"><?php
                                                try { $genre = Genre::findById($product->genre_id); }
                                                catch (Exception $e) {}
                                                if ($genre !== null){
                                                    ?>
                                                <small><?=$genre->name?></small>
                                                <?php
                                                }
                                                    ?>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                    </div>
    </main>
    <?php require 'include/footer.php'; ?>
</div>
<script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
<script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
