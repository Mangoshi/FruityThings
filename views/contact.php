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
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/form.css">
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/myBootstrap.css">

    <title>FruityThings</title>
</head>
<body>
<div class="grid">
    <header>
        <?php require 'include/navbar.php'; ?>
    </header>
    <article role="main" class="article">
        <?php require 'include/flash.php'; ?>
        <div class="f--source" style="text-align: center;">
            <br>
            <hr>
            <h1 class="f--jet">Contact us</h1>
            <hr>
            <br>
            <div>
                <div>
                    <p>
                        Aliquam tristique tellus eu diam gravida tempor. Sed tellus
                        velit, scelerisque vel elementum et, dignissim at felis.
                        Integer in aliquet quam, fermentum bibendum lacus. Mauris
                        nisi massa, facilisis nec viverra nec, faucibus in felis. In
                        posuere malesuada orci, vitae gravida tortor aliquet blandit.
                        Etiam et velit quis augue viverra sodales. Quisque eu magna
                        in est vestibulum lacinia ut eu mauris. Etiam imperdiet
                        sollicitudin erat, et placerat massa bibendum id. Proin odio
                        metus, iaculis at posuere sed, facilisis vel mauris.
                        Pellentesque ac neque at leo tincidunt auctor in eu ante.
                        Etiam ut suscipit tortor. Sed pretium suscipit eros, eu
                        scelerisque purus porta eget. Aenean tempus risus vel urna
                        blandit feugiat.
                    </p>
                    <br>
                    <p>
                        Phasellus nulla lacus, tristique quis sem eu, porta suscipit
                        libero. Nulla pulvinar purus id pellentesque feugiat. Nam sit
                        amet tincidunt elit. Nunc tincidunt orci ac auctor luctus.
                        Sed iaculis auctor dictum. Etiam et metus ullamcorper,
                        viverra nisl et, volutpat velit. Etiam vel bibendum elit.
                        Proin condimentum auctor viverra.
                    </p>
                    <br>
                    <hr>
                </div>
                <div class="formContainer">
                    <h1 class="f--jet">Send us a message</h1>
                    <hr>
                    <br>
                    <p>Please use the form below to send us a message.</p>
                    <p> Ask us a question, and our support team will get back to you as soon as possible.</p>
                    <br>
                    <form class="form" name='contact' action="<?= APP_URL . '/actions/email/email.php' ?>" method="post" enctype="multipart/form-data">
                        <div class="form-field">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" />
                            <span class="error"><?= error("name") ?></span>
                        </div>
                        <div class="form-field">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" value="<?= old("email") ?>" />
                            <span class="error"><?= error("email") ?></span>
                        </div>
                        <div class="form-field">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" id="subject" value="<?= old("subject") ?>" />
                            <span class="error"><?= error("subject") ?></span>
                        </div>
                        <div class="form-field">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" rows="5"><?= old("message") ?></textarea>
                            <span class="error"><?= error("message") ?></span>
                        </div>
                        <div class="form-field">
                            <label for="attachment">Image Attachment</label>
                            <input type="file" name="attachment" id="attachment" />
                            <span class="error"><?= error("attachment") ?></span>
                        </div>
                        <div class="form-field">
                            <label></label>
                            <input class="btn btn-primary" type="submit" name="submit" value="Send" style="margin-bottom: 20px;"/>
                            <a class="formCancelButton btn btn-light" href="<?= APP_URL . "/" ?>" >Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </article>
    <?php require 'include/footer.php'; ?>
</div>
<script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
<script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
