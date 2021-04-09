<?php require_once '../config.php';

if ($request->is_logged_in()) {
    $role = $request->session()->get("role");
    if($role !== "customer") {
        $request->redirect("/views"."/".$role."/home.php");
    }
}

use FruityThings\Model\Cart;

$cart = Cart::get($request);

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

    <title>FruityThings</title>
</head>
<body>
<div class="grid">
    <header>
        <?php require 'include/navbar.php'; ?>
    </header>
    <article role="main" class="f--jet">
        <?php require 'include/flash.php'; ?>
        <div class="tableRow">
            <h1>View Cart</h1>
            <?php if ($cart->empty()) { ?>
                <p style="margin-bottom: 70vh;">Your shopping cart is empty.</p>
            <?php } else { ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th class="text-right">Price</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-right">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cartTotal = 0;
                    foreach($cart->items as $item) {
                        $product = $item->product;
                        $cartTotal += $product->price * $item->quantity;
                        ?>
                        <tr>
                            <td class="bold"><?= $item->product->title ?></td>
                            <td class="text-right">€<?=$item->product->price?></td>
                            <td class="text-center">
                                <form method="post">
                                    <input type="hidden" name="id" value="<?= $product->id ?>"/>
                                    <button class="btn btn-light" type="submit" formaction="<?= APP_URL ?>/actions/cart-remove.php">&lt;</button>
                                    <span class="ml-2 mr-2"><?=$item->quantity?></span>
                                    <button class="btn btn-light" type="submit" formaction="<?= APP_URL ?>/actions/cart-add.php">&gt;</button>
                                </form>
                            </td>
                            <?php $itemTotal = $item->product->price * $item->quantity; ?>
                            <td class="text-right">€<?= number_format($itemTotal, 2) ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="3">Total</th>
                        <th class="text-right">€<?=number_format($cartTotal, 2)?></th>
                    </tr>
                    </tbody>
                </table>
                <a href="<?= APP_URL ?>/views/cart-checkout.php" class="btn btn-primary" style="margin-bottom: 50vh;">Checkout</a>
            <?php } ?>
        </div>
    </article>
    <?php require 'include/footer.php'; ?>
</div>
<script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
<script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
