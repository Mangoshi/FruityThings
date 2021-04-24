<?php require_once '../config.php';

use FruityThings\Model\Product;
use FruityThings\Model\Genre;
use FruityThings\Model\Image;

try {
    $rules = [
        'product_id' => 'present|integer|min:1'
    ];
    $request->validate($rules);
    if (!$request->is_valid()) {
        throw new Exception("Illegal request");
    }
    $product_id = $request->input('product_id');
    $product = Product::findById($product_id);
    if ($product === null) {
        throw new Exception("Illegal request parameter");
    }
}
catch (Exception $ex) {
    $request->session()->set("flash_message", $ex->getMessage());
    $request->session()->set("flash_message_class", "alert-warning");

    $request->redirect("index.php");
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300&family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/edca80fe33.js" crossorigin="anonymous"></script>

    <!-- My Stylesheets -->
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/form.css">
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/myBootstrap.css">
    <link href="<?= APP_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet"/>

    <title>Product Listing</title>
</head>
<body>
<div class="grid">
    <header>
        <?php require 'include/navbar.php'; ?>
    </header>
    <article role="main" class="f--jet">
        <div>
            <div class="container">
                <div>
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card">
                                <h1 class="cardTitle text-center">
                                    <?= $product->title ?>
                                    <li class="list-group-item">
                                        <?php
                                        try {
                                            $image = Image::findById($product->image_id);
                                        } catch (Exception $e) {
                                        }
                                        if ($image !== null){
                                            ?>
                                            <img src="<?= APP_URL . "actions/" . $image->filename ?>" width="500px" alt="image" class="card-img" />
                                            <?php
                                        }
                                        ?>
                                </h1>
                                </li>
                                <div class="card-body">
                                    <p class="card-text"><?= $product->description ?></p>
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
                                        <span class="text-muted">
                                            <?php if($product->on_windows = 1){?> Windows <?php } ?>

                                            <?php if($product->on_linux = 1){?> Linux <?php } ?>

                                            <?php if($product->on_mac = 1){?> Mac <?php } ?>
                                            </span>
                                    </li>

                                    <li class="list-group-item">
                                        <small> Developer: </small><span class="text-muted"><?= $product->developer ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <small> Publisher: </small><span class="text-muted"><?= $product->publisher ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <small> Genre: </small>
                                        <span class="text-muted">
                                            <?php
                                            try { $genre = Genre::findById($product->genre_id); }
                                            catch (Exception $e) {}
                                            if ($genre !== null){
                                                ?>
                                                <?=$genre->name?>
                                                <?php
                                            }
                                            ?>
                                            </span>
                                    </li>
                                    <li class="list-group-item add-to-cart-item">
                                        <a class="add-to-cart--text" href="<?= APP_URL ?>actions/cart-add.php?id=<?= $product->id ?>">
                                            Add To Cart <i class="far fa-plus-square"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    </div>
    </article>
    <?php require 'include/footer.php'; ?>
</div>
<script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
<script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
