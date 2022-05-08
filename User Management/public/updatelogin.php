<?php

require __DIR__ . '/../src/bootstrap.php';
require_login();

if(isset($_POST['update']))
{	

	  $password = mysqli_real_escape_string($mysqli, $_POST['password']);
	  $designation = mysqli_real_escape_string($mysqli, $_POST['designation']);	
    $role = mysqli_real_escape_string($mysqli, $_POST['role']);	

    $passwordn = password_hash($password, PASSWORD_BCRYPT);

    
		
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET password='$passwordn',designation='$designation',role='$role' WHERE id='$id'");
		
		//redirectig to the display page. In our case, it is index.php
		redirect_with_message('viewlogin.php','updated Succsfully');
	
}


//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$username = $res['username'];
	$password = $res['password'];
	$role = $res['role'];
    $designation = $res['designation'];
}
?>


<?php view('loginheader', ['title' => 'Dashboard']) ?>


<?php if ($_SESSION['role'] == 'admin') {?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewlogin.php">View Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addlogin.php">Add Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<br><br>

<form action="updatelogin.php" method="post" class="container" style="width: 450px;">
<br><br>
    <h1>Update Login</h1>

    <div class="mb-3">
        <label class="form-label" for="username">Enter Username : </label>
        <input class="form-control" type="text"  name="username" id="username"   placeholder="<?php echo $username;  ?>" disabled>
        <div style="color:red;"><small><?= $errors['username'] ?? '' ?></small></div>
    </div>

    <div class="mb-3">
        <label class="form-label" for="password">Enter password:</label>
        <input class="form-control" type="password" name="password" id="password"  required>
        <div style="color:red;"><small style="text-color:red"><?= $errors['password'] ?? '' ?></small></div>
    </div>

    <div class="mb-3">
      <div class="mb-3">
      <label class="form-label" for="designation">Designation :</label>
      </div>
        <select class="form-select" name="designation" id="designation"  required>
          <option selected>Choose...</option>
          <option value="Inventory Manager">Inventory Manager</option>
          <option value="Reservation Manager">Reservation Manager</option>
          <option value="Housekeeping Manager">Housekeeping Manager</option>
          <option value="Kitchen Manager">Kictchen Manager</option>
          <option value="Restuarent Manager">Restuarent Manager</option>
          <option value="Admin">Admin</option>
        </select>
    </div>

    <div class="mb-3">
      <div class="mb-3">
    <label class="form-label" for="role">Role :</label>
     </div>
        <select class="form-select" name="role" id="role"  required>
          <option selected>Choose...</option>
          <option value="admin">Admin</option>
          <option value="manager">Manager</option>
          <option value="other">Other</option>
         </select>
     </div>

    <button type="submit" name="update" class="btn btn-primary">Update</button> <br><br>

    </form>

<?php }?>

<?php view('footer') ?>



