<?php $role = $request->session()->get("role"); ?>

<nav class="nav">
    <ul class="nav_grid">
        <li class="nav_grid--fullwidth nav_title"><a href="<?= APP_URL ?>">FruityThings</a></li>
        <li><a class="nav_link" href="<?= APP_URL ?>">Store</a></li>
        <li ><a class="nav_link" href="<?= APP_URL ?>views/about.php">About</a></li>
        <li ><a class="nav_link" href="<?= APP_URL ?>views/contact.php">Contact</a></li>

        <?php if (!$request->session()->has("email")) { ?>
            <li><a class="nav_link" href="<?= APP_URL ?>views/auth/login-form.php">Login</a></li>
            <li><a class="nav_link" href="<?= APP_URL ?>views/auth/register-form.php">Register</a></li>
        <?php } else { ?>
            <li><a class="nav_link" href="<?= APP_URL ?>views/cart-view.php">Cart</a></li>
            <li><a class="nav_link" href="<?= APP_URL ?>actions/logout.php">Logout</a></li>
        <?php } ?>

        <?php if ($role == "admin") { ?>
            <li ><a class="nav_link admin_link" href="<?= APP_URL ?>views/admin/product-create.php">Add.Product</a></li>
        <?php } ?>
    </ul>
</nav>
