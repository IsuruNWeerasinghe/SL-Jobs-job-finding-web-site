<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="../assets/title.png">
        <title>SL Jobs Seeker - Register</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div class="header">
            <h2>Register</h2>
        </div>

        <form method="post" action="register.php">

            <?php echo display_error(); ?>

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="input-group">
                <label>User type</label>
                <select name="user_type" id="user_type" >
                    <option value=""></option>
                    <option value="user">User</option>
                    <option value="company">Company</option>
                </select>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password_1">
            </div>
            <div class="input-group">
                <label>Confirm password</label>
                <input type="password" name="password_2">
            </div>
            <div class="input-group">
                <button type="button" class="btn" onclick="window.location.href='../index.html'" />
                <b>Cancel</b></button>
                <button type="submit" class="btn" name="register_btn"><b>Register</b></button>
            </div>
        </form>
    </body>
</html>