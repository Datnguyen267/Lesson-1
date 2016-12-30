<?php $currentUser = $this->session->userdata('user');
    $username = $currentUser['username'];
?>

<!DOCTYPE html>
<html>
<title><?php echo $title; ?></title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo asset_url('js/change_date.js'); ?>"> </script>
<script type="text/javascript" src="<?php echo asset_url('js/change-email_validation.js'); ?>"> </script>
<script type="text/javascript" src="<?php echo asset_url('js/change-password_validation.js'); ?>"> </script>
<script type="text/javascript" src="<?php echo asset_url('js/change-profile_validation.js'); ?>"> </script>

<head>

    </head>

    <body>

        <h1>Member template</h1>
        <div> <a href = "<?php echo base_url();?>member/home">Home</a>
           <p align = 'right'> Hello <?php echo $username;?> </p>
        </div>
        <div class="wrapper">

            <?php echo $body; ?>

        </div>
    </body>
</html>