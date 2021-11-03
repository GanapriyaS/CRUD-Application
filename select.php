<?php
include 'dbconnect.php';

if(isset($_GET['user']))
{	
    $id=$_GET['user'];
    $result=mysqli_query($conn,"SELECT * from `users` WHERE id=$id;"); 
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $username_detail = $row["username"]; 
    $email_detail = $row["email"];
    $gender_detail=$row["gender"]; 
    $birthdate_detail = $row["birthdate"];
    $age_detail= $row["age"];
    $mobileno_detail = $row["mobileno"];

    $result = array("username" => $username_detail,
    "email" => $email_detail,
    "gender" => $gender_detail,
    "birthdate" => $birthdate_detail,
    "age" => $age_detail,
    "mobileno" => $mobileno_detail);

    echo json_encode($result);
}

?>