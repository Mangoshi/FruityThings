<?php require_once '../config.php'; ?>
<?php

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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Product Listing</title>

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
            <div class="container">
                <div>
                    <div class="row">
                            <div class="col-12 mb-4">
                                <div class="card">
                                    <h1 class="cardTitle">
                                        <?= $product->title ?>
                                    <li class="list-group-item">
                                        <?php
                                        try {
                                            $image = Image::findById($product->image_id);
                                        } catch (Exception $e) {
                                        }
                                        if ($image !== null){
                                            ?>
                                            <img src="<?= APP_URL . "actions/" . $image->filename ?>" width="500px" alt="image" />
                                            <?php
                                        }
                                        ?>
                                    </h1>
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
                                            <span class="text-muted">
                                            <?php if($product->on_windows == 1){?> Windows <?php };?>

                                            <?php if($product->on_linux == 1){?> Linux <?php };?>

                                            <?php if($product->on_mac == 1){?> Mac <?php };?>
                                            </span>
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
