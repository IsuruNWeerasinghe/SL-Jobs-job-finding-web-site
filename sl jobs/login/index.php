<?php 
include('functions.php');

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="../assets/title.png">
        <title>User Home</title>
        <link rel="stylesheet" type="text/css" href="css/style-dashboard.css">
        <style>
            * {
                box-sizing: border-box;
            }

            /* Create two equal columns that floats next to each other */
            .column {
                float: left;
                width: 50%;
                padding: 10px;
            }

            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }
            /* Style the buttons */
            .btn {
                border: none;
                outline: none;
                padding: 12px 16px;
                background-color: #bc4a4a;
                cursor: pointer;
            }

            .btn:hover {
                background-color: #ddd;
            }

            .btn.active {
                background-color: #666;
                color: white;
            }

            /* The Modal (background) */
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                padding-top: 100px; /* Location of the box */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }

            /* Modal Content */
            .modal-content {
                background-color: #fefefe;
                margin: auto;
                padding: 20px;
                border: 1px solid #888;
                width: 40%;
            }

            /* The Close Button */
            .close {
                color: #aaaaaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: #000;
                text-decoration: none;
                cursor: pointer;
            }
            /*Css code for apply buttons*/
            .button {background-color: #f44336;
                border: none;
                color: white;
                padding: 4px 40px;
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
            <h2>User Home Page</h2>
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
                <img src="images/user_profile.png"  >

                <div>
                    <?php  if (isset($_SESSION['user'])) : ?>
                    <strong><?php echo $_SESSION['user']['username']; ?></strong>

                    <small>
                        <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
                        <br>
                        <a href="index.php?logout='1'" style="color: red;">logout</a>
                        <a href="edit_profile.php" style="color: red;">Edit Profile</a>
                    </small>

                    <?php endif ?>
                </div>
            </div>
        </div>
        <h1><center>FEATURED JOBS LIST</center></h1>
        <div id="btnContainer">
            <button class="btn" onclick="listView()"><i class="fa fa-bars"></i> List</button> 
            <button class="btn active" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
        </div>
        <br>
        <div class="row">
            <div class="column" style="background-color:#aaa;">
                <img src="../assets/jobs/j2.png" width="100%">
                <button class="button" id="myBtn" style="float:right">Apply</button>
                <a href="vacancies_download.php"><button class="button" style="float:right">Download</button></a>

                <!-- The Modal -->
                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <form method="post" action="insert-cv.php">

                            <?php echo display_error(); ?>

                            <div class="input-group">
                                <label>Full name</label>
                                <input type="text" name="full_name" required>
                            </div>
                            <div class="input-group">
                                <label>Email</label>
                                <input type="email" name="email" required>
                            </div>
                            <div class="input-group">
                                <label>Contact Number</label>
                                <input type="text" name="contact_no" required>
                            </div>
                            <div class="input-group">
                                <label>Upload your CV</label>
                                <a href="../cv.php" target="_blank">Click Here</a>
                            </div>
                            <input type="hidden" name="status" value="Applied">
                            <input type="hidden" name="access_status" value="Accessed">
                            <div class="input-group">
                                <button type="submit" class="btn" name="register_btn">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="column" style="background-color:#bbb;">
                <img src="../assets/jobs/j8.png" width="100%">
                <button class="button" id="myBtn" style="float:right" onClick="alert('Only First Section is functioning')">Apply</button>
                <a href=" "><button class="button" style="float:right">Download</button></a>
                <!-- The Modal -->
                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <form method="post" action="insert-cv.php">

                            <?php echo display_error(); ?>

                            <div class="input-group">
                                <label>Full name</label>
                                <input type="text" name="full_name" required>
                            </div>
                            <div class="input-group">
                                <label>Email</label>
                                <input type="email" name="email" required>
                            </div>
                            <div class="input-group">
                                <label>Contact Number</label>
                                <input type="text" name="contact_no" required>
                            </div>
                            <div class="input-group">
                                <label>Upload your CV</label>
                                <a href="../cv.php" target="_blank">Click Here</a>
                            </div>
                            <div class="input-group">
                                <button type="submit" class="btn" name="register_btn">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="column" style="background-color:#ccc;">
                <img src="../assets/jobs/j3.png" width="100%">
                <button class="button" id="myBtn" style="float:right" onClick="alert('Only First Section is functioning')">Apply</button>
                <a href=" "><button class="button" style="float:right">Download</button></a>
                <!-- The Modal -->
                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <form method="post" action="insert-cv.php">

                            <?php echo display_error(); ?>

                            <div class="input-group">
                                <label>Full name</label>
                                <input type="text" name="full_name" required>
                            </div>
                            <div class="input-group">
                                <label>Email</label>
                                <input type="email" name="email" required>
                            </div>
                            <div class="input-group">
                                <label>Contact Number</label>
                                <input type="text" name="contact_no" required>
                            </div>
                            <div class="input-group">
                                <label>Upload your CV</label>
                                <a href="../cv.php" target="_blank">Click Here</a>
                            </div>
                            <div class="input-group">
                                <button type="submit" class="btn" name="register_btn">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="column" style="background-color:#ddd;">
                <img src="../assets/jobs/j4.png" width="100%">
                <button class="button" id="myBtn" style="float:right" onClick="alert('Only First Section is functioning')">Apply</button>
                <a href=" "><button class="button" style="float:right">Download</button></a>
                <!-- The Modal -->
                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <form method="post" action="insert-cv.php">

                            <?php echo display_error(); ?>

                            <div class="input-group">
                                <label>Full name</label>
                                <input type="text" name="full_name" required>
                            </div>
                            <div class="input-group">
                                <label>Email</label>
                                <input type="email" name="email" required>
                            </div>
                            <div class="input-group">
                                <label>Contact Number</label>
                                <input type="text" name="contact_no" required>
                            </div>
                            <div class="input-group">
                                <label>Upload your CV</label>
                                <a href="../cv.php" target="_blank">Click Here</a>
                            </div>
                            <div class="input-group">
                                <button type="submit" class="btn" name="register_btn">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="column" style="background-color:#aaa;">
                <img src="../assets/jobs/j5.png" width="100%">
                <button class="button" id="myBtn" style="float:right" onClick="alert('Only First Section is functioning')">Apply</button>
                <a href=" "><button class="button" style="float:right">Download</button></a>
                <!-- The Modal -->
                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <form method="post" action="insert-cv.php">

                            <?php echo display_error(); ?>

                            <div class="input-group">
                                <label>Full name</label>
                                <input type="text" name="full_name" required>
                            </div>
                            <div class="input-group">
                                <label>Email</label>
                                <input type="email" name="email" required>
                            </div>
                            <div class="input-group">
                                <label>Contact Number</label>
                                <input type="text" name="contact_no" required>
                            </div>
                            <div class="input-group">
                                <label>Upload your CV</label>
                                <a href="../cv.php" target="_blank">Click Here</a>
                            </div>
                            <div class="input-group">
                                <button type="submit" class="btn" name="register_btn">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="column" style="background-color:#bbb;">
                <img src="../assets/jobs/j6.png" width="100%">
                <button class="button" id="myBtn" style="float:right" onClick="alert('Only First Section is functioning')">Apply</button>
                <a href=" "><button class="button" style="float:right">Download</button></a>
                <!-- The Modal -->
                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <form method="post" action="insert-cv.php">

                            <?php echo display_error(); ?>

                            <div class="input-group">
                                <label>Full name</label>
                                <input type="text" name="full_name" required>
                            </div>
                            <div class="input-group">
                                <label>Email</label>
                                <input type="email" name="email" required>
                            </div>
                            <div class="input-group">
                                <label>Contact Number</label>
                                <input type="text" name="contact_no" required>
                            </div>
                            <div class="input-group">
                                <label>Upload your CV</label>
                                <a href="../cv.php" target="_blank">Click Here</a>
                            </div>
                            <div class="input-group">
                                <button type="submit" class="btn" name="register_btn">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="column" style="background-color:#ccc;">
                <img src="../assets/jobs/j7.png" width="100%">
                <button class="button" id="myBtn" style="float:right" onClick="alert('Only First Section is functioning')">Apply</button>
                <a href=" "><button class="button" style="float:right">Download</button></a>
                <!-- The Modal -->
                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <form method="post" action="insert-cv.php">

                            <?php echo display_error(); ?>

                            <div class="input-group">
                                <label>Full name</label>
                                <input type="text" name="full_name" required>
                            </div>
                            <div class="input-group">
                                <label>Email</label>
                                <input type="email" name="email" required>
                            </div>
                            <div class="input-group">
                                <label>Contact Number</label>
                                <input type="text" name="contact_no" required>
                            </div>
                            <div class="input-group">
                                <label>Upload your CV</label>
                                <a href="../cv.php" target="_blank">Click Here</a>
                            </div>
                            <div class="input-group">
                                <button type="submit" class="btn" name="register_btn">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="column" style="background-color:#ddd;">
                <img src="../assets/jobs/j1.png" width="100%">
                <button class="button" id="myBtn" style="float:right" onClick="alert('Only First Section is functioning')">Apply</button>
                <a href=" "><button class="button" style="float:right">Download</button></a>
                <!-- The Modal -->
                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <form method="post" action="insert-cv.php">

                            <?php echo display_error(); ?>

                            <div class="input-group">
                                <label>Full name</label>
                                <input type="text" name="full_name" required>
                            </div>
                            <div class="input-group">
                                <label>Email</label>
                                <input type="email" name="email" required>
                            </div>
                            <div class="input-group">
                                <label>Contact Number</label>
                                <input type="text" name="contact_no" required>
                            </div>
                            <div class="input-group">
                                <label>Upload your CV</label>
                                <a href="../cv.php" target="_blank">Click Here</a>
                            </div>
                            <div class="input-group">
                                <button type="submit" class="btn" name="register_btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Get the elements with class="column"
            var elements = document.getElementsByClassName("column");

            // Declare a loop variable
            var i;

            // List View
            function listView() {
                for (i = 0; i < elements.length; i++) {
                    elements[i].style.width = "100%";
                }
            }

            // Grid View
            function gridView() {
                for (i = 0; i < elements.length; i++) {
                    elements[i].style.width = "50%";
                }
            }

            /* Optional: Add active class to the current button (highlight it) */
            var container = document.getElementById("btnContainer");
            var btns = container.getElementsByClassName("btn");
            for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener("click", function(){
                    var current = document.getElementsByClassName("active");
                    current[0].className = current[0].className.replace(" active", "");
                    this.className += " active";
                });
            }
        </script>

        <!--    JS code for pop up window-->
        <script>
            // Get the modal
            var modal = document.getElementById('myModal');

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>

    </body>

</html>