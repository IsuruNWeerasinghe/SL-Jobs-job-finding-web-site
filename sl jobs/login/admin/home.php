<?php 
include('../functions.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="../images/title.png">
        <title>Admin Home</title>
        <link rel="stylesheet" type="text/css" href="../css/style-dashboard.css">
        <style>
            .header {
                background: #003366;
            }
            button[name=register_btn] {
                background: #003366;
            }


            #user_table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #user_table td, #user_table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #user_table tr:nth-child(even){background-color: #f2f2f2;}

            #user_table tr:hover {background-color: #ddd;}

            #user_table th {
                padding-top: 8px;
                padding-bottom: 20px;
                text-align: left;
                background-color: #0033669c;
                color: white;
            }

            /*Css code for apply buttons*/
            .button {background-color: #f44336;
                border: none;
                color: white;
                padding: 9px 15px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;}
        </style> 
    </head>
    <body>
        <div class="header">
            <h2>Admin - Home Page</h2>
        </div>
        <div class="content">
            <!-- notification message -->
            <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php 
                    echo $_SESSION['success']; 
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
            <?php endif ?>

            <!-- logged in user information -->
            <div class="profile_info">
                <img src="../images/admin_profile.png"  >

                <div>
                    <?php  if (isset($_SESSION['user'])) : ?>
                    <strong><?php echo $_SESSION['user']['username']; ?></strong>

                    <small>
                        <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
                        <br>
                        &nbsp; 
                        <a href="view.php" style="color: red;">Delete an User</a>
                        <a href="home.php?logout='1'" style="color: red;">logout</a>
                        <a href="vacancies.php" style="color: red;">Vacancies</a>
                    </small>

                    <?php endif ?>
                </div>
            </div>
        </div>
        <center><h2><U>FOLLOWING USERS WHO HAVE ACCESSED THE SYSTEM</U></h2></center>
        <table id="user_table" border="1">
            <thead>
                <th><center>Full Name</center></th>
                <th><center>Email Address</center></th>
                <th><center>Contact No</center></th>
                <th><center>Access Status</center></th>
                <th><center>Access Time and Date</center></th>
            </thead>
            <tbody>
                <?php
    include('db-config.php');
                    $query=mysqli_query($conn,"select * from `user_cv_infor`");
                    while($row=mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><center><?php echo $row['full_name']; ?></center></td>
                    <td><center><?php echo $row['email']; ?></center></td>
                    <td><center><?php echo $row['contact_no']; ?></center></td>
                    <td><center><font color="#31c339"><strong><?php echo $row['access_status']; ?></strong></font></center></td>
                    <td><center><font color="#d11f48"><?php echo $row['access_time']; ?></font></center></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>