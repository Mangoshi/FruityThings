<?php require_once '../../config.php';

if (!$request->is_logged_in()) {
  $request->redirect("/views/auth/login-form.php");
}
$role = $request->session()->get("role");
if ($role !== "customer") {
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

      <title>FruityThings - Home</title>
  </head>
  <body>
  <div class="grid">
      <header>
          <?php require 'include/navbar.php'; ?>
      </header>
      <article role="main" class="main f--source">
          <?php require 'include/flash.php'; ?>
          <div class="welcomeMessage" style="text-align: center; margin-bottom: 60vh">
              <h1>Customer home</h1>
              <p class="lead">
                  Hello, <?= $request->session()->get("name") ?>
              </p>
              <?php require 'views/customer/orders/index.php'; ?>
          </div>
      </article>
      <?php require 'include/footer.php'; ?>
  </div>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/orders.js"></script>
  </body>
</html>
