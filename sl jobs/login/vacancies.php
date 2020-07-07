<?php
// Creating connection
$conn = new mysqli('localhost', 'root', '','job_portal_db');
// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="images/title.png">
        <title>Upload Vacancies</title>
        <style>
            table th, td{
                border: 1px solid green;
                text-align:left;
            }
            th,td{
                padding:8px;

            }
            table{
                border-collapse:collapse;
                width:50%;
            }
            table td a{
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 7px 12px;
                text-decoration: none;
                margin: 4px 2px;
                cursor: pointer;

            }
            th{
                padding:15px;
                background:lightgreen;
                font-size:20px;
                font-weight:bold;
            }
            input[type=file]{
                padding:5px 0px 5px 5px;
                background:black;
                border-radius:5px;
            }
            input[type=submit]{
                background:black;
                color:white;
                padding:6px 8px;
                font-weight:bold;
                cursor:pointer;
                border-radius:5px;
            }
        </style>
    </head>
    <body>
        <?php
        include('upload.php');
        ?>
        <h2>Upload Vacancy Here</h2>
               <a href="company_profile.php">Back to homepage</a>
        <br>
        <br>
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="file" name="pdf"/>
            <input type="submit" name="submit" value="Upload"/>
        </form>
        <hr/>
        <table>
            <tr>
                <th>Vacancy Title</th>
                <th>Uploaded File Size</th>
                <th>File Type</th>
                <th>Action</th>
            </tr>
            <?php
            $result=mysqli_query($conn,"SELECT*FROM vacancies ORDER by ID DESC");
            while($row=$result->fetch_array()){
            ?>

            <tr>
                <td><?php echo $row['name'];?></td>
                <td><?php echo number_format($row['size']/(1024*1024),2);?>MB</td>
                <td><?php echo $row['type'];?></td>
                <td><a href="download.php?pdf=<?php echo $row['name'];?>">Download</a></td>
            </tr>
            <?php }?>
        </table>
    </body>
</html>