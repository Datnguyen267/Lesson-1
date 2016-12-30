<!DOCTYPE html>
<html>

<head>
<title><?php echo $title; ?></title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script>
<script type="text/javascript" src="<?php echo asset_url('js/change_date.js'); ?>"> </script>
<script type="text/javascript" src="<?php echo asset_url('js/refresh_captcha.js'); ?>"> </script>
<script type="text/javascript" src="<?php echo asset_url('js/validation.js'); ?>"> </script>
<link href="<?php echo asset_url('css/guest.css'); ?>" type="text/css" rel="stylesheet" />
    </head>

    <body>

        <h1>Guest template</h1>

        <div class="wrapper">

            <?php echo $body; ?>

        </div>

    </body>

</html>