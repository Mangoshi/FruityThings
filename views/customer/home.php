<?php require_once '../../config.php'; ?>
<?php
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

      <title>FruityThings</title>
  </head>
  <body>
  <div class="grid">
      <header>
          <?php require 'include/navbar.php'; ?>
      </header>
      <main role="main">
          <div class="welcomeMessage">
              <h1>Customer home</h1>
              <p class="lead">
                  Hello, <?= $request->session()->get("name") ?>
              </p>
          </div>
      </main>
      <?php require 'include/footer.php'; ?>
  </div>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
