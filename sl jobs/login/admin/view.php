<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="../images/title.png">
        <title>SL Jobs Seeker</title>
        <style>
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
                padding-top: 25px;
                padding-bottom: 20px;
                text-align: left;
                background-color: #4CAF50;
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
        <br>
        <br>
        <br>
        <br>
        <div>
            <center><h2><U>ACTIVE USERS</U></h2></center>
            <table id="user_table" border="1">
                <thead>
                    <th>User id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
                    include('db-config.php');
                    $query=mysqli_query($conn,"select * from `user_infor`");
                    while($row=mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['user_type']; ?></td>
                        <td>
                            <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <br>
            <a href="home.php"><button class="button" type="button">CLOSE</button></a>
        </div>
    </body>
</html>