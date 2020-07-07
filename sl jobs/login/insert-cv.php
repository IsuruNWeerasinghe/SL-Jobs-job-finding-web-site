<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "job_portal_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO user_cv_infor (full_name, email, contact_no, status,access_status)
VALUES ('" . $_POST["full_name"] . "',
		'" . $_POST["email"] . "',
        '" . $_POST["contact_no"] . "',
        '" . $_POST["status"] . "',
	    '" . $_POST["access_status"] . "')";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="images/title.png">
        <title>SL Jobs Seeker</title>
        <style>
            .retrieve-btn{
                padding: 12px 60px;
                background-image: -webkit-linear-gradient(top, #d93476, #ab2475);
                background-image: -moz-linear-gradient(top, #d93476, #ab2475);
                background-image: -ms-linear-gradient(top, #d93476, #ab2475);
                background-image: -o-linear-gradient(top, #d93476, #ab2475);
                background-image: linear-gradient(to bottom, #d93476, #ab2475);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f381a7', endColorstr='#f381a7',GradientType=0 ); /* IE6-9 */
                border: 0;
                color: #FFF;
                cursor: pointer;
                border-radius: 4px;
                margin-left: 10px;
            }

        </style>
    </head>
    <body>
        <header>
            <br>
            <br>
            <section class="hero">
                <div class="container">
                    <div class="row nav-wrapper">
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="row hero-content">
                        <div class="col-md-12">
                            <hr>
                            <center>
                                <h2 class="animated fadeInDown"><font color="#000000">YOU HAVE BEEN SUCCESSFULLY SUBMITTED !</font></h2>
                                <hr>
                            </center>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <center>
                                <a href="index.php" class="retrieve-btn">Back to home</a>
                            </center>
                        </div>
                    </div>
                </div>
            </section>
        </header>
        <br>
        <br>
        <footer><strong><center>Copyright &copy;<?php echo date("Y"); ?> SL Jobs Seeker.</center></strong></footer>
    </body>
</html>
