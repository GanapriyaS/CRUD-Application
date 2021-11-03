<?php

if($_SERVER["REQUEST_METHOD"] == "GET") { 
if(isset($_GET['delete']))
{
    $id=$_GET['delete']; 
    $result=mysqli_query($conn,"DELETE FROM `users` WHERE id=$id;");
    if ($result) { 
		echo '<div class="notification is-success"><button class="delete"></button><strong>Success!</strong> Deleted user successfully</div>';
	} 
	else {
		echo mysqli_error($conn);
	}
}
}

?>