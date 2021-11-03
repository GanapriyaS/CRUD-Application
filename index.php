<?php include 'insert.php';?> 
<?php include 'delete.php'; ?>
<?php include 'update.php' ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,">
    <title>Crud App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" >

</head> 
	
<body> 
	<nav class="navbar is-warning p-2" role="navigation" aria-label="main navigation">
  <div class="navbar-brand navbar-end">
    <a class="navbar-item" href="#">
    <h1 class="title is-3" >CRUD APP <i class="fas fa-users-cog"></i></h1>
</a>
  </div>
</nav>
<section class="section">
    <div class="container is-widescreen ">
  
  
    <?php 
            if($update ==false):
            ?>
           <h3 class="title is-3 has-text-centered">Add a user</h3>
            <?php else: ?>
              <h3 class="title is-3 has-text-centered">Edit a user</h3>
              <?php endif; ?>

    <form method="post" role="form" class="box">
    
    

          <div class="field is-horizontal">
            <div class="field-label is-medium">
              <label class="label ">Username</label>
            </div>
            <div class="field-body">
              <div class="field">
                <p class="control">
                <input class="input" type="text" required placeholder="e.g Ganapriya Kheersagar" id="username" value="<?php echo $username; ?>" name="username" >
                </p>
              </div>
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-label is-medium">
              <label class="label ">Email</label>
            </div>
            <div class="field-body">
              <div class="field">
                <p class="control">
                <input class="input" type="email" id="email" required placeholder="e.g. example@gmail.com" value="<?php echo $email; ?>" name="email">
                </p>
              </div>
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-label is-medium">
              <label class="label ">Password</label>
            </div>
            <div class="field-body">
              <div class="field">
                <p class="control">
                <input class="input" type="password" required placeholder="" id="password" value="<?php echo $password; ?>"  name="password">
                </p>
              </div>
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-label is-medium">
              <label class="label ">Confirm password</label>
            </div>
            <div class="field-body">
              <div class="field">
                <p class="control">
                <input class="input" type="password" required placeholder="" id="cpassword"   name="cpassword">
                <small class="text-muted"> 
              Make sure to type the same password 
              </small>
                </p>
              </div>
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-label is-medium">
              <label class="label ">Gender</label>
            </div>
            <div class="field-body">
            <div class="field">
                <p class="control">
                <label for="male" class="radio">
                <input type="radio" name="gender" value="male" required id="male">
                Male
              </label>
              <label for="female" class="radio">
                <input type="radio" id="female" name="gender" value="female">
                Female
              </label>
              <label for="other" class="radio">
                <input type="radio"  id="other" name="gender" value="other">
                Other
              </label>
            </p>
            </div>
            </div>
          </div>

        
          <div class="field is-horizontal">
            <div class="field-label is-medium">
              <label class="label ">Birthday</label>
            </div>
            <div class="field-body">
              <div class="field">
                <p class="control">
                <input type="date" id="birthdate" class="input" name="birthdate"  value="<?php echo $birthdate; ?>" required> 
                </p>
              </div>
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-label is-medium">
              <label class="label ">Age</label>
            </div>
            <div class="field-body">
              <div class="field">
                <p class="control">
                <input type="number" min=18 max=60 class="input"  name="age" id="age"  value="<?php echo $age; ?>" required >
                </p>
              </div>
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-label is-medium">
              <label class="label ">Mobile Number</label>
            </div>
            <div class="field-body">
              <div class="field">
                <p class="control">
                <input type="tel" required class="input" name="mobileno" id="mobileno"   value="<?php echo $mobileno; ?>" pattern="[0-9]{10}" >
                </p>
              </div>
            </div>
          </div>
          <div class="field is-grouped is-grouped-centered">
            <p class="control">
            <?php 
            if($update ==true):
            ?>
            <input class="button is-success"  id="submit" name="update" type="submit" value="UPDATE" ></input>
            <?php else: ?>
              <button type="submit" name="add" class="button is-success" value="UPDATE">ADD</button>
              <?php endif; ?>
            </p>
            <p class="control">
            <button type="reset" class="button is-light">
                Reset
            </button>
            </p>
          </div>

    </form>
    
    <h3 class="title is-3 has-text-centered mt-6 mb-5">USERS<a class="ml-3 button is-success btn-sm float-right"  href="index.php">ADD<i class="ml-2 fas fa-plus" style="color:white;"></i></a></h3>
    <div class="table-container">
  <table class="table table is-bordered is-striped is-hoverable is-fullwidth">
  <thead >
    <tr>
      <th>S.No</th>
      <th>Username</th>
      <th>Email</th>
      <th>Mobile Number</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  <?php
 	$result=mysqli_query($conn,"SELECT * from `users`;");
 	$num = mysqli_num_rows($result); 
 	
 	for($i=1;$i<=$num;$i++)
 	{
 		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 
?>
  
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['username'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['mobileno'] ?></td>
      
      <td><div class="buttons has-addons is-centered" >
  <a class="button is-success btn-sm "  href="index.php?edit=<?php echo $row['id']; ?>"><i class="fas fa-edit" style="color:white;"></i></a>
  <a class="button is-danger btn-sm" href="index.php?delete=<?php echo $row['id']; ?>"><i class="fas fa-trash-alt" style="color:white;"></i></a>
  <button class="button is-dark btn-sm modal-button" onclick="user(<?php echo $row['id']; ?>)" data-target="modal-ter" aria-haspopup="true"><i class="fas fa-eye" style="color:white;"></i></button>
    </div></td>
    </tr>
  
  <?php
      }           
  ?>
  </tbody>
  </table>
</div>
    </div>

  </section>
 
  <div id="modal-ter" class="modal" >
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title has-text-centered is-primary"><b>USER DETAILS</b></p>
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
    <div class="panel">
  <a class="panel-block">
    <span class="panel-icon">
      <i class="fas fa-user" aria-hidden="true"></i>
    </span>
    <h3 id="tem"></h3>
    Username : <span id="username_detail" class="pl-1"></span>
  </a>
  <a class="panel-block">
    <span class="panel-icon">
      <i class="fas fa-envelope"></i>
    </span>
    Email ID : <span id="email_detail" class="pl-1"></span>
  </a>
  
  <a class="panel-block">
    <span class="panel-icon">
      <i class="fas fa-child" aria-hidden="true"></i>
    </span>
   Gender : <span id="gender_detail" class="pl-1"></span>
  </a>
  <a class="panel-block">
    <span class="panel-icon">
      <i class="fas fa-calendar-alt" aria-hidden="true"></i>
    </span>
    Birthday : <span id="birthdate_detail" class="pl-1"></span>
  </a>
  <a class="panel-block">
    <span class="panel-icon">
      <i class="fas fa-hourglass"></i>
    </span>
    Age : <span id="age_detail" class="pl-1"></span>
  </a>
  <a class="panel-block">
    <span class="panel-icon">
      <i class="fas fa-phone" aria-hidden="true"></i>
    </span>
    Mobile Number : <span id="mobileno_detail" class="pl-1"></span>
  </a>
    </div>
    </section>
   
  </div>
</div>
</body> 


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  
  document.addEventListener('DOMContentLoaded', () => {
    (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
      const $notification = $delete.parentNode;

      $delete.addEventListener('click', () => {
        $notification.parentNode.removeChild($notification);
      });
    });
  });

  var rootEl = document.documentElement;
  var $modals = document.querySelectorAll('.modal');
  var $modalButtons = document.querySelectorAll('.modal-button');
  var $modalCloses = document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button');

  if ($modalButtons.length > 0) {
    $modalButtons.forEach(function ($el) {
      $el.addEventListener('click', function () {
        var target = $el.dataset.target;
        openModal(target);
      });
    });
  }

  if ($modalCloses.length > 0) {
    $modalCloses.forEach(function ($el) {
      $el.addEventListener('click', function () {
        closeModals();
      });
    });
  }

  function openModal(target) {
    var $target = document.getElementById(target);
    rootEl.classList.add('is-clipped');
    $target.classList.add('is-active');
  }

  function closeModals() {
    rootEl.classList.remove('is-clipped');
    $modals.forEach(function ($el) {
      $el.classList.remove('is-active');
    });
  }

  document.addEventListener('keydown', function (event) {
    var e = event || window.event;

    if (e.keyCode === 27) {
      closeModals();
      closeDropdowns();
    }
  });

  function user(id){
  $.ajax({
    type: 'get',
    url: 'select.php',
    data: {
      "user": id 
    },

  success: function(response) {
    var json = JSON.parse(response);
    $('#username_detail').html(json["username"]);
    $('#email_detail').html(json.email);
    $('#gender_detail').html(json.gender);
    $('#age_detail').html(json.age);
    $('#birthdate_detail').html(json.birthdate);
    $('#mobileno_detail').html(json.mobileno);
  }});
}
  
</script>
</html> 

