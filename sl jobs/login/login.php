<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="../assets/title.png">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>

        <div class="header">
            <h2>Login</h2>
        </div>

        <form method="post" action="login.php">

            <?php echo display_error(); ?>

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" >
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <div class="input-group">
                <button type="button" class="btn" onclick="window.location.href='../index.html'" />
                <b>Cancel</b></button>                
                <button type="submit" class="btn" name="login_btn"><b>Login</b></button>

            </div>
        </form>


    </body>
</html>