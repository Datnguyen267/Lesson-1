<?php $currentUser = $this->session->userdata('user');
    $username = $currentUser['username'];
?>

<!DOCTYPE html>
<html>

<head>
<title><?php echo $title; ?></title>
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