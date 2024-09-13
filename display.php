<?php
  $db="student_db";
  $con= mysqli_connect('localhost','root','',$db);
  if(!$db){
    die("connection failed: " .mysqli_connect_error());
  }
  if(isset($_POST['submit']))
  {
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $dob=$_POST['dob'];

    $insert="insert into stud values('$name','$mobile','$email','$dob')";
    mysqli_query($con,$insert);
  }

?>