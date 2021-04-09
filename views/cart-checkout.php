<?php require_once '../config.php';

if ($request->is_logged_in()) {
    $role = $request->session()->get("role");
    if($role !== "customer") {
        $request->redirect("/views"."/".$role."/home.php");
    }
}

use FruityThings\Model\Cart;
$cart = Cart::get($request);
$cartSize = sizeof($cart->items);

use FruityThings\Model\User;
$user = User::findByEmail($request->session()->get("email"));

use FruityThings\Model\Customer;
$customer = Customer::findByUserId($user->id);

$date = date('Y-m-d');

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
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/bootstrap.min.css">

    <title>FruityThings - Checkout</title>
</head>
<body>
<div class="grid">
    <header>
        <?php require 'include/navbar.php'; ?>
    </header>
    <article role="main" class="f--jet">
        <?php require 'include/flash.php'; ?>
        <div class="tableRow">
            <h1>Checkout</h1>
            <?php if ($cart->empty()) { ?>
                <p style="margin-bottom: 70vh;">Your shopping cart is empty.</p>
            <?php } else { ?>
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 order-md-2 mb-4">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Your cart</span>
                                <span class="badge badge-secondary badge-pill"><?php $cartSize ?></span>
                            </h4>
                            <ul class="list-group mb-3">
                                <?php
                                $cartTotal = 0;
                                foreach($cart->items as $item) {
                                $product = $item->product;
                                $cartTotal += $product->price * $item->quantity;
                                $itemTotal = $item->product->price * $item->quantity;
                                ?>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0"><?= $item->product->title ?></h6>
                                        <small>Quantity: <?=$item->quantity?></small>
                                    </div>
                                    <span class="text-muted">€<?=$item->product->price?></span>
                                </li>
                                <?php } ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total (EUR)</span>
                                    <strong>€<?=number_format($cartTotal, 2)?></strong>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-8 order-md-1">
                            <h4 class="mb-3">Billing address</h4>
                            <form name="checkout" class="checkout--form" action="<?= APP_URL . '/actions/checkout.php' ?>" method="post">
                                <div class="row">
                                    <input type="hidden" name="customer_id" id="customer_id" value="<?= $customer->id ?>"/>
                                    <input type="hidden" name="date" id="date" value="<?= $date ?>"/>

                                    <div class="col-md-12 mb-3">
                                        <label for="firstName">Full name</label>
                                        <input disabled type="text" class="form-control" id="name" placeholder="Full name" value="<?= $user->name ?>" required>
                                        <div class="invalid-feedback">
                                            Valid name is required.
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                    <input disabled type="email" class="form-control" id="email" placeholder="you@example.com" value="<?= $user->email ?>">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <textarea disabled rows="4" class="form-control" id="address" placeholder="1234 Main St" required><?= $customer->address ?></textarea>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>

                                <hr class="mb-4 mt-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="save-info">
                                    <label class="custom-control-label" for="save-info">Save this information for next time</label>
                                </div>
                                <hr class="mt-4 mb-4">

                                <h4 class="mb-3">Payment</h4>

                                <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input id="payment_method" name="payment_method" type="radio" class="custom-control-input" checked required value="Credit Card">
                                        <label class="custom-control-label" for="credit">Credit card</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="payment_method" name="payment_method" type="radio" class="custom-control-input" required value="Debit Card">
                                        <label class="custom-control-label" for="debit">Debit card</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="cc-name">Name on card</label>
                                        <input type="text" class="form-control" id="cc-name" placeholder="JOE BLOGS" required value="<?= old("cc-name") ?>">
                                        <small class="text-muted">Full name as displayed on card</small>
                                        <div class="invalid-feedback">
                                            Name on card is required
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="cc-number">Credit card number</label>
                                        <input type="text" class="form-control" id="cc-number" placeholder="XXXX-XXXX-XXXX-XXXX" required>
                                        <div class="invalid-feedback">
                                            Credit card number is required
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="cc-expiration">Expiration</label>
                                        <input type="text" class="form-control" id="cc-expiration" placeholder="MM" required>
                                        <div class="invalid-feedback">
                                            Expiration date required
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="cc-cvv">CVV</label>
                                        <input type="text" class="form-control" id="cc-cvv" placeholder="YY" required>
                                        <div class="invalid-feedback">
                                            Security code required
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-4">
                                <button class="btn-lg btn-block formSubmitButton" type="submit">Place Order</button>
                                <a href="<?= APP_URL ?>/views/cart-view.php" class="btn-lg btn-block formCancelButton">Edit Cart</a>
                                <hr class="mt-4">
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </article>
    <?php require 'include/footer.php'; ?>
</div>
<script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
<script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
