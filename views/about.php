<?php require_once '../config.php'; ?>
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
      <?php require 'include/flash.php'; ?>
      <article role="main" class="article" style="text-align: center;">
          <h1 class="f--jet">About Us</h1>
            <div class="f--source">
            <hr>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Vivamus rutrum condimentum porttitor. Cras interdum lectus 
                nisl. Cras ac purus dui. Donec facilisis tortor metus, vel 
                fermentum nunc aliquet et. Cras auctor non metus eget 
                volutpat. Class aptent taciti sociosqu ad litora torquent 
                per conubia nostra, per inceptos himenaeos. Ut ac turpis in 
                sem pulvinar blandit. Maecenas hendrerit ac dui ut pulvinar. 
                Nam a eros sit amet lectus commodo tempus. Sed quis purus 
                metus. Sed metus mi, bibendum ut dui quis, mattis eleifend 
                ipsum. Sed dui turpis, cursus at commodo ac, consectetur et 
                augue. Donec non dolor eros. Aenean consequat facilisis est, 
                ac ornare turpis.
              </p>
                <br>
              <p>
                Pellentesque risus orci, laoreet vel lorem ac, consequat 
                sagittis nulla. Morbi cursus vel ligula pretium consectetur. 
                Donec ac erat ac augue convallis sollicitudin vitae consequat 
                libero. Nunc porta justo a fermentum aliquet. Praesent 
                placerat velit eget magna euismod porttitor. Sed at dapibus 
                risus, et pellentesque nisl. Sed laoreet lacus dignissim 
                velit aliquet facilisis. Donec leo arcu, posuere ut 
                fermentum eu, fringilla non nisi. Curabitur elementum nisi 
                ac commodo porttitor. In hendrerit lacinia quam ut facilisis. 
                Sed lectus felis, sollicitudin sed leo non, lacinia 
                pellentesque nunc. Suspendisse accumsan vitae orci quis 
                volutpat. In ac nisi ac dui pharetra suscipit.
              </p>
                <br>
              <p>
                Sed tincidunt augue eleifend, laoreet diam a, convallis 
                nulla. Proin in orci consequat, venenatis enim et, imperdiet 
                urna. Sed a convallis quam, eget interdum sapien. Maecenas 
                eleifend est eget nunc tristique, eget convallis purus 
                congue. Lorem ipsum dolor sit amet, consectetur adipiscing 
                elit. Praesent a elit rhoncus, condimentum ipsum eu, varius 
                erat. Nullam arcu nulla, viverra ac blandit ut, vestibulum 
                quis enim. Vestibulum ante ipsum primis in faucibus orci 
                luctus et ultrices posuere cubilia curae; Quisque a augue 
                vel lorem convallis consequat. Nunc quis tincidunt justo, 
                sit amet consequat sem.
              </p>
            <hr>
            </div>
            <div class="col" style="margin-top: 20px;">
              <img src="<?= APP_URL ?>/assets/img/cart.png" />
            </div>
      </article>
      <?php require 'include/footer.php'; ?>
    </div>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
