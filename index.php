<?php require_once 'config.php'; ?>
<?php

use FruityThings\Model\Product;
use FruityThings\Model\Genre;
use FruityThings\Model\Image;

$products = Product::findAll();

// Date
$latestProduct = Product::findAll_SDLO("release_date", "DESC", 1, 0);
$secondLatestProduct = Product::findAll_SDLO("release_date", "DESC", 1, 1);
$latestTenProducts = Product::findAll_SDLO("release_date", "DESC", 10, 0);

// Steam Rating
$topThreeProducts = Product::findAll_SDLO("average_rating", "ASC", 3, 0);

// Price
$leastExpensiveThree = Product::findAll_SDLO("price", "ASC", 3, 0);
$mostExpensiveThree = Product::findAll_SDLO("price", "DESC", 3, 0);

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
<!--    <link rel="stylesheet" href="--><?//= APP_URL ?><!--/assets/css/bootstrap.min.css"/>-->
<!--    <link rel="stylesheet" href="--><?//= APP_URL ?><!--/assets/css/template.css">-->

    <title>FruityThings</title>
</head>
<body>
<div class="grid">
    <header>
        <?php require 'include/navbar.php'; ?>
    </header>
    <?php require 'include/flash.php'; ?>
    <article role="main" class="article">
        <div class="row_1">
            <?php foreach ($latestProduct as $product) { ?>
            <div class="big_card--showcase">
                <a href="views/product-view.php?product_id=<?= $product->id ?>">
                    <?php
                    try {
                        $image = Image::findById($product->image_id);
                    } catch (Exception $e) {
                    }
                    if ($image !== null){
                        ?>
                        <img src="<?= APP_URL . "actions/" . $image->filename ?>" alt="image" class="big_thumbnail--showcase"/>
                        <?php
                    }
                    ?>
                </a>
            </div>
            <?php } ?>
            <?php foreach ($secondLatestProduct as $product) { ?>
                <div class="big_card--sale">
                    <a href="views/product-view.php?product_id=<?= $product->id ?>">
                        <?php
                        try {
                            $image = Image::findById($product->image_id);
                        } catch (Exception $e) {
                        }
                        if ($image !== null){
                            ?>
                            <img src="<?= APP_URL . "actions/" . $image->filename ?>" alt="image" class="big_thumbnail--sale"/>
                            <?php
                        }
                        ?>
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="row_2">
            <div class="row_2--card_section">
                <h2 class="sub_row--heading f--jet">Highest Rating</h2>
                <div class="row_2--sub_row sub_row_1">
                    <?php foreach ($topThreeProducts as $product) { ?>
                        <div class="small_card">
                            <a href="views/product-view.php?product_id=<?= $product->id ?>" class="product_link--anchor">
                                <?php
                                try {
                                    $image = Image::findById($product->image_id);
                                } catch (Exception $e) {
                                }
                                if ($image !== null){
                                    ?>
                                    <img src="<?= APP_URL . "actions/" . $image->filename ?>" alt="image" class="medium_thumbnail" />
                                    <?php
                                }
                                ?>
                                <div class="product_title f--source">
                                    <small class="product_title--text"><?= $product->title ?></small>
                                </div>
                            </a>
                            <div class="product_pricing f--jet">
                                <small class=product_discount--text>-0%</small>
                                <a class="product_cost--text" href="<?= APP_URL ?>actions/cart-add.php?id=<?= $product->id ?>">
                                    <small>€<?= $product->price ?> <i class="far fa-plus-square"></i></small>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <h2 class="sub_row--heading f--jet">Least Expensive</h2>
                <div class="row_2--sub_row sub_row_2">
                    <?php foreach ($leastExpensiveThree as $product) { ?>
                        <div class="small_card">
                            <a href="views/product-view.php?product_id=<?= $product->id ?>" class="product_link--anchor">
                                <?php
                                try {
                                    $image = Image::findById($product->image_id);
                                } catch (Exception $e) {
                                }
                                if ($image !== null){
                                    ?>
                                    <img src="<?= APP_URL . "actions/" . $image->filename ?>" alt="image" class="medium_thumbnail" />
                                    <?php
                                }
                                ?>
                                <div class="product_title f--source">
                                    <small class="product_title--text"><?= $product->title ?></small>
                                </div>
                            </a>
                            <div class="product_pricing f--jet">
                                <small class=product_discount--text>-0%</small>
                                <a class="product_cost--text" href="<?= APP_URL ?>actions/cart-add.php?id=<?= $product->id ?>">
                                    <small>€<?= $product->price ?> <i class="far fa-plus-square"></i></small>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <h2 class="sub_row--heading f--jet">Most Expensive</h2>
                <div class="row_2--sub_row sub_row_3">
                    <?php foreach ($mostExpensiveThree as $product) { ?>
                        <div class="small_card">
                            <a href="views/product-view.php?product_id=<?= $product->id ?>" class="product_link--anchor">
                                <?php
                                try {
                                    $image = Image::findById($product->image_id);
                                } catch (Exception $e) {
                                }
                                if ($image !== null){
                                    ?>
                                    <img src="<?= APP_URL . "actions/" . $image->filename ?>" alt="image" class="medium_thumbnail" />
                                    <?php
                                }
                                ?>
                                <div class="product_title f--source">
                                    <small class="product_title--text"><?= $product->title ?></small>
                                </div>
                            </a>
                            <div class="product_pricing f--jet">
                                <small class=product_discount--text>-0%</small>
                                <a class="product_cost--text" href="<?= APP_URL ?>actions/cart-add.php?id=<?= $product->id ?>">
                                    <small>€<?= $product->price ?> <i class="far fa-plus-square"></i></small>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row_2--table_section">
                <div class="table--buttons f--jet">
                    <a class="table--button">New</a>
                    <a class="table--button">Popular</a>
                    <a class="table--button">Sale</a>
                </div>
                <?php foreach ($latestTenProducts as $product) { ?>
                <div class="table_product">
                    <a class="table_product_anchor" href="views/product-view.php?product_id=<?= $product->id ?>" class="product_link--anchor">
                        <?php
                        try {
                            $image = Image::findById($product->image_id);
                        } catch (Exception $e) {
                        }
                        if ($image !== null){
                            ?>
                            <img src="<?= APP_URL . "actions/" . $image->filename ?>" alt="image" class="table_product_thumbnail" />
                            <?php
                        }
                        ?>
                        <div class="table_product_title f--source">
                            <small class="table_product_title--text"><?= $product->title ?></small>
                        </div>
                    </a>
                    <div class="table_product_pricing">
                        <small class="table_product_cost--text f--jet">€<?= $product->price ?></small>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="row_3">
            <h2 class="row_3--heading f--jet">All Products</h2>
            <?php foreach ($products as $product) { ?>
            <div class="small_card">
                <a href="views/product-view.php?product_id=<?= $product->id ?>" class="product_link--anchor">
                    <?php
                    try {
                        $image = Image::findById($product->image_id);
                    } catch (Exception $e) {
                    }
                    if ($image !== null){
                        ?>
                        <img src="<?= APP_URL . "actions/" . $image->filename ?>" alt="image" class="medium_thumbnail" />
                        <?php
                    }
                    ?>
                    <div class="product_title f--source">
                        <small class="product_title--text"><?= $product->title ?></small>
                    </div>
                </a>
                <div class="product_pricing f--jet">
                    <small class=product_discount--text>-0%</small>
                    <a class="product_cost--text" href="<?= APP_URL ?>actions/cart-add.php?id=<?= $product->id ?>">
                        <small>€<?= $product->price ?> <i class="far fa-plus-square"></i></small>
                    </a>
                </div>
            </div>
            <?php } ?>
    </article>
    <?php require 'include/footer.php'; ?>
</div>
<script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
<script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
