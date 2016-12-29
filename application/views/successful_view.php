<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        span{color: blue; font-style: italic;}
    </style>
    <meta charset="utf-8">
    <title>Lesson1</title>
</head>
<body>
    <div id="body">
       <div> Thank you for registering! A confirmation email has been sent to <?php echo $this->input->post('email')?> Please click on the Activation link to Active your account</div>
       <p> <a href='main'>Main menu </a></p>
    </div>
</body>
</html>