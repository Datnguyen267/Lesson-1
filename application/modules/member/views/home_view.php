<!DOCTYPE html>
<html>
    <head>
        <title>Lesson1</title>
    </head>
    <body>
        <div id="container">
            <h1>Home</h1>

            <div id="body">
                <a href="profile">1. Profile</a> </br>
                <a href = "changeemail">2. Change email </a> </br>
                <a href = "changepassword">3. Change password </a> </br>
                <a href = "<?php echo base_url();?>member/home/logout">4. Logout </a>
            </div>
        </div>

    </body>
</html>