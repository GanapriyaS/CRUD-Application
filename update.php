<?php
include 'dbconnect.php';
$showAlert = false; 
$showError = false; 
$exists=false;
	
if(isset($_REQUEST["update"]))
{	 
    $id=$_GET['edit'];
    $username = $_REQUEST["username"]; 
    $email = (isset($_REQUEST["email"]) ? $_REQUEST["email"] : '');
    $password = $_REQUEST["password"]; 
    $cpassword = $_REQUEST["cpassword"]; 
    $gender=$_REQUEST["gender"]; 
    $birthdate = $_REQUEST["birthdate"];
    $age= $_REQUEST["age"];
    $mobileno = $_REQUEST["mobileno"];	
    $sql = "Select * from users where username='$username' and id!='$id' " ; 
    $result = mysqli_query($conn, $sql); 
    $num = mysqli_num_rows($result);  

    if($num == 0) { 
        if(($password == $cpassword) && $exists==false) { 
            $sql= "Update users SET   username= '$username', password='$password',email='$email', gender='$gender', birthdate='$birthdate', age='$age', mobileno = '$mobileno' where id ='$id';";
            $result = mysqli_query($conn,$sql); 
            if ($result) { 
                $showAlert = true; 
            } 
            else {
                echo mysqli_error($conn);
            }
        } 
        else { 
            $showError = "Passwords do not match"; 
        }	 
    }   

    if($num>0) { 
        $exists="Username not available"; 
    } 
}
    if($showAlert) { 
        echo '<div class="notification is-success"><button class="delete"></button>
        <strong>Success!</strong> User have been updated.
        </div>';
    } 
    if($showError) { 
        echo '<div class="notification is-danger"><button class="delete"></button>
        <strong>Error!</strong> '. $showError.'
        </div>';  
    } 
    if($exists) { 
        echo '<div class="notification is-danger"><button class="delete"></button>
        <strong>Error!</strong> '. $exists.'
        </div>';  
    } 

?>