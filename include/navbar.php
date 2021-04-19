<?php $role = $request->session()->get("role"); ?>

<nav class="myNav">
    <ul class="myNav_grid">
        <?php if ($role == "customer") { ?>
        <li class="myNav_grid--fullwidth myNav_title f--marker"><a href="<?= APP_URL ?>/views/customer/home.php">FruityThings</a></li>
        <?php } else { ?>
        <li class="myNav_grid--fullwidth myNav_title f--marker"><a href="<?= APP_URL ?>/views/admin/home.php">FruityThings</a></li>
        <?php } ?>
        <li><a class="myNav_link" href="<?= APP_URL ?>">Store</a></li>
        <li ><a class="myNav_link" href="<?= APP_URL ?>views/about.php">About</a></li>
        <li ><a class="myNav_link" href="<?= APP_URL ?>views/contact.php">Contact</a></li>

        <?php if (!$request->session()->has("email")) { ?>
            <li><a class="myNav_link" href="<?= APP_URL ?>views/auth/login-form.php">Login</a></li>
            <li><a class="myNav_link" href="<?= APP_URL ?>views/auth/register-form.php">Register</a></li>
        <?php } else { ?>
            <?php if ($role == "customer") { ?>
                <li><a class="myNav_link" href="<?= APP_URL ?>views/cart-view.php">Cart</a></li>
            <?php } ?>
            <li><a class="myNav_link" href="<?= APP_URL ?>actions/logout.php">Logout</a></li>
        <?php } ?>
    </ul>
</nav>
