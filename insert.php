<?php
include 'dbconnect.php';
$showAlert = false; 
$showError = false; 
$exists=false;
	
if($_SERVER["REQUEST_METHOD"] == "POST") { 
    if(isset($_REQUEST["add"]))
    {  

        $username = $_POST["username"]; 
        $email = (isset($_POST["email"]) ? $_POST["email"] : '');
        $password = $_POST["password"]; 
        $cpassword = $_POST["cpassword"]; 
        $gender=$_POST["gender"]; 
        $birthdate = $_POST["birthdate"];
        $age= $_POST["age"];
        $mobileno = $_POST["mobileno"];	
        $sql = "Select * from users where username='$username'"; 
        $result = mysqli_query($conn, $sql); 
        $num = mysqli_num_rows($result); 

        if($num == 0) { 
            if(($password == $cpassword) && $exists==false) 
            { 
                $sql= "INSERT INTO `users` (username,email,password,gender,age,birthdate,mobileno,date) VALUES ('$username','$email','$password','$gender','$age','$birthdate','$mobileno',current_timestamp());";
                $result = mysqli_query($conn, $sql); 
                if ($result) { 
                    $showAlert = true; 
                } 
                else{
                    echo mysqli_error($conn);
                }
            } 
            else { 
                $showError = "Passwords do not match"; 
            }	 
        }
        
        if($num>0) 
        { 
            $exists="Username not available"; 
        } 
    }
   
    if($showAlert) { 
        echo '<div class="notification is-success"><button class="delete"></button> <strong>Success!</strong> User have been added. </div>';
    } 

    if($showError) { 
            echo '<div class="notification is-danger"><button class="delete"></button><strong>Error!</strong> '. $showError.'</div>';  
    } 
            
    if($exists) { 
        echo '<div class="notification is-danger"><button class="delete"></button><strong>Error!</strong> '. $exists.'</div>';  
    } 
}

?>