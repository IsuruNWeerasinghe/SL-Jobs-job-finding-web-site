<?php
// Create database connection
$db = mysqli_connect("localhost", "root", "", "job_portal_db");

// Initialize message variable
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {
    // Get image name
    $cv = $_FILES['cv']['name'];
    // Get text
    $cv_text = mysqli_real_escape_string($db, $_POST['cv_text']);

    // image file directory
    $target = "CV Files/".basename($cv);

    $sql = "INSERT INTO cvs (cv, cv_text) VALUES ('$cv', '$cv_text')";
    // execute query
    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['cv']['tmp_name'], $target)) {
        $msg = "CV uploaded successfully";
    }else{
        $msg = "Failed to upload CV";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="assets/title.png">
        <title>CV Upload</title>
        <style type="text/css">
            #content{
                width: 50%;
                margin: 160px auto;
                border: 5px solid #121212;
            }
            form{
                width: 50%;
                margin: 20px auto;
            }
            form div{
                margin-top: 5px;
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
        <div id="content">
            <center><h2><?php echo $msg ?></h2></center>
            <form method="POST" action="cv.php" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                <div>
                    <input type="file" name="cv">
                </div>
                <div>
                    <textarea 
                              id="text" 
                              cols="50" 
                              rows="4" 
                              name="cv_text" 
                              placeholder="Any Description write here.."></textarea>
                </div>
                <div>
                    <center><button class="button" type="submit" name="upload">SUBMIT YOUR CV</button>&nbsp; &nbsp;
                        <button class="button" type="button" onclick="javascript:window.close()">CLOSE</button></center>
                </div>
            </form>
        </div>
    </body>
</html>