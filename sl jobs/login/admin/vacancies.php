<?php 
include('../functions.php');

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="images/title.png">
        <title>Companies who joined with us</title>
        <link rel="stylesheet" type="text/css" href="css/style-dashboard.css">
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

        <a href="home.php">Back</a>
        <center><h2><U>COMPANIES WHO HAVE SUBMITED THEIR VACANCIES</U></h2></center>
        <table id="user_table" border="1">
            <thead>
                <th><center>Full Name</center></th>
                <th><center>Email Address</center></th>
                <th><center>Contact No</center></th>
                <th><center>Status</center></th>
                <th></th>
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
                    <td><center><font color="#d11f48"><?php echo $row['status']; ?></font></center></td>
                    <td><center><a href="../sl jobs/CV Files"><button class="button">Click</button></a></center></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>