<?php require_once '../../config.php';

if (!$request->is_logged_in()) {
  $request->redirect("/views/auth/login-form.php");
}
$role = $request->session()->get("role");
if ($role !== "admin") {
  $request->redirect("/actions/logout.php");
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
      <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/bootstrap.min.css">

      <title>FruityThings - Admin Home</title>
  </head>
  <body>
  <div class="grid">
      <header>
          <?php require 'include/navbar.php'; ?>
      </header>
      <article class="article f--jet" role="main" style="margin-bottom: 40vh;">
          <?php require 'include/flash.php'; ?>
        <div>
          <h1>Admin home</h1>
          <p class="lead">
            Hello, <?= $request->session()->get("name") ?>
          </p>
            <ul class="nav nav-tabs" id="tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active"
                       id="products-tab"
                       data-toggle="tab"
                       href="#products"
                       role="tab"
                       aria-controls="products"
                       aria-selected="true"
                    >
                        Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       id="orders-tab"
                       data-toggle="tab"
                       href="#orders"
                       role="tab"
                       aria-controls="orders"
                       aria-selected="false"
                    >
                        Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       id="customers-tab"
                       data-toggle="tab"
                       href="#customers"
                       role="tab"
                       aria-controls="customers"
                       aria-selected="false"
                    >
                        Customers
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="tabContent">
                <div class="tab-pane fade show active" id="products" role="tabpanel" aria-labelledby="products-tab">
                    <?php require 'views/admin/products/index.php'; ?>
                </div>
                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                    <?php require 'views/admin/orders/index.php'; ?>
                </div>
                <div class="tab-pane fade" id="customers" role="tabpanel" aria-labelledby="customers-tab">
                    <?php require 'views/admin/customers/index.php'; ?>
                </div>
            </div>
        </div>
      </article>
      <?php require 'include/footer.php'; ?>
    </div>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/products.js"></script>
    <script src="<?= APP_URL ?>/assets/js/orders.js"></script>
    <script src="<?= APP_URL ?>/assets/js/customers.js"></script>
  </body>
</html>
