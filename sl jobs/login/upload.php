<?php
// Creating connection
$conn = new mysqli('localhost', 'root', '','job_portal_db');
// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
$errors=1;
 //Targeting Folder
 $target="files/";
  
if(isset($_POST['submit'])){
 $target=$target.basename($_FILES['pdf']['name']);
 //Getting Selected PDF Type
 $type=pathinfo($target,PATHINFO_EXTENSION);
 //Allow Certain File Format To Upload
 if($type!='pdf' && $type!='doc' && $type!='docx' && $type!='epub' ){
  echo "Only PDF,DOC,DOCX,Epub files format are allowed to Upload";
  $errors=0;
 }
 //Checking for File Size 1000000 bytes== 1MB
  $filesize=$_FILES['pdf']['size'];
if ($filesize < 100 && $filesize< 2000000){
   echo 'You Can not Upload Large File(2MB) by Default..</a>'; 
    $errors=0;
   }
  //checking for Exsisting Doc File Files
  if(file_exists($target)){
   echo "File Already Exist";
   $errors=0;
  }
 // Check if $errors is set to 0 by an error
 if($errors==0){
  echo 'Your File Not Uploaded';
 }else{
  //if not error encountered 
   //Moving The PDF or Doc file to Desired Directory
  $uplaod_success=move_uploaded_file($_FILES['pdf']['tmp_name'],$target);
  if($uplaod_success==TRUE){
   //Getting Selected PDF Information
   $name=$_FILES['pdf']['name'];
   $size=$_FILES['pdf']['size'];
   $result=mysqli_query($conn,"INSERT INTO vacancies (name,size,type)VALUES('$name','$size','$type')");
   if($result==TRUE){
    echo "Your pdf '$name' Successfully Uploaded";
   }
 }
}
}
?>