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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fruity Things - Checkout</title>

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
            <h1>Checkout</h1>
            <?php if ($cart->empty()) { ?>
                <p>Your shopping cart is empty.</p>
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
                            <td class="text-center"><?=$item->quantity?></td>
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
            <a href="<?= APP_URL ?>/views/cart-view.php" class="btn btn-primary">Edit Cart</a>
            <a href="<?= APP_URL ?>/views/cart-checkout.php" class="btn btn-primary">Place Order</a>
            <?php } ?>
        </div>
    </main>
    <?php require 'include/footer.php'; ?>
</div>
<script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
<script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
