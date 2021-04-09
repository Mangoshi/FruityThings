<?php require_once '../../config.php'; ?>
<?php
if ($request->is_logged_in()) {
    $role = $request->session()->get("role");
    $request->redirect("/views"."/".$role."/home.php");
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

    <title>FruityThings</title>
</head>
<body>
<div class="grid grid--login">
    <header>
        <?php require 'include/navbar.php'; ?>
    </header>
    <?php require 'include/flash.php'; ?>
    <main class="main">
        <section class="section section--login_register">
            <div class="showcase">
                <div class="showcase_card--login_register">
                    <div class="showcase_card--title">
                        <i class="fas fa-lemon showcase_card--logo"></i>
                        <h2 class="f--marker">It's time to get fruity</h2>
                    </div>
                </div>
                <form name="register" action="<?= APP_URL . '/actions/register.php' ?>" method="post" class="login--form f--jet" style="align-self: center;">
                    <input type="text" name="name" id="name" class="register--input" placeholder="Full Name" value="<?= old("name") ?>">
                    <span class="error"><?= error("name") ?></span>

                    <input type="tel" name="phone" id="phone" class="register--input" placeholder="Phone Number" value="<?= old("phone") ?>">
                    <span class="error"><?= error("phone") ?></span>

                    <textarea id="address" name="address" class="register--input" placeholder="Address" rows="5"><?= old("address") ?></textarea>
                    <span class="error"><?= error("address") ?></span>

                    <input type="text" name="username" id="username" class="register--input" placeholder="Username" value="<?= old("username") ?>">
                    <span class="error"><?= error("username") ?></span>

                    <input type="text" name="email" id="email" class="register--input" placeholder="Email" value="<?= old("email") ?>">
                    <span class="error"><?= error("email") ?></span>

                    <input type="password" name="password" id="password" class="register--input" placeholder="Password">
                    <span class="error"><?= error("password") ?></span>

                    <button type="submit" class="register--button">Register</button>
                    <a class="btn btn-light formCancelButton" href="<?= APP_URL . "/" ?>" style="width: 15%; align-self: center;">Cancel</a>
                </form>
            </div>
        </section>
        <?php require 'include/footer.php'; ?>
    </main>
</div>
<script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
<script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
$request->session()->forget("flash_data");
$request->session()->forget("flash_errors");
?>