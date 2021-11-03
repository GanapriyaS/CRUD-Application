<?php
$server = "localhost";
$username ="root";
$password ="";
$database ="iwt";
$update=false;

try {
$conn= mysqli_connect($server,$username,$password,$database);
if($conn){
echo "";
}
}catch(Exception $errormsg){
echo $errormsg->getMessage();
die("Error". mysqli_connect_error());  
}

if(isset($_GET['edit']))
           {	
           	
           	$id=$_GET['edit'];
           	$result=mysqli_query($conn,"SELECT * from `users` WHERE id=$id;"); 
           	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			$username = $row["username"]; 
			$email = $row["email"];
			$password = $row["password"]; 
			$gender=$row["gender"]; 
			$birthdate = $row["birthdate"];
			$age= $row["age"];
			$mobileno = $row["mobileno"];	
           	$update=true;
		
           }

?>
