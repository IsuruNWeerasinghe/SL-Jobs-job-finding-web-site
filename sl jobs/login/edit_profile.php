<?php 
    session_start();

    // connect to database
    $db = mysqli_connect('localhost', 'root', '', 'job_portal_db');

    // variable declaration
    $username = "";
    $email    = "";
     
     ?>

     <?php 
           if (isset($_SESSION['user'])) {
               
                $user=$_SESSION['user']['username'] ;
            

                $query="SELECT * FROM user_infor WHERE username='{$user}' LIMIT 1" ;

                $result=mysqli_query($db,$query) ;

                if ($result) {
                    $set=mysqli_fetch_assoc($result) ;

                    $username    =  $set['username'];
                    $email       =  $set['email'];

                }


           }



      $errors   = array();
         
         if (isset($_POST['edit_btn'])) {
             
         

        $username    =  ($_POST['username']);
        $email       =  ($_POST['email']);
        

        
        if (empty($username)) { 
            array_push($errors, "Username is required"); 
        }
        if (empty($email)) { 
            array_push($errors, "Email is required"); 
        }
        
       

        // register user if there are no errors in the form
        if (count($errors) == 0) {
        $user=$_SESSION['user']['username'] ;
                $query = "UPDATE user_infor SET username='{$username}',
                                email='{$email}' WHERE username='{$user}' LIMIT 1  ";
               
                $result_set=mysqli_query($db, $query);
                if ($result_set) {
                    $_SESSION['success']  = "User successfully Edited!!";
                header('location: index.php'); 
                } else echo 'failed' ;

                


            } }

                ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="../assets/title.png">
        <title>SL Jobs Seeker - Register</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div class="header">
            <h2>Edit Profile</h2>
        </div>

        <form method="post" action="edit_profile.php">

           

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>">
            </div>
            
            <div class="input-group">
                <button type="submit" class="btn" name="edit_btn">Save</button>
            </div>
        </form>
    </body>
</html>