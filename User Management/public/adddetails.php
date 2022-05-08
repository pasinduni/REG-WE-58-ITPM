<?php
require __DIR__ . '/../src/bootstrap.php';

require_login();

if(isset($_POST['update']))
{	

	$username =  $_SESSION['username'];

	$phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
		
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET phone='$phone',email='$email' WHERE username='$username'");
		
		//redirectig to the display page. In our case, it is index.php
		redirect_with_message('addlogin.php','updated Succsfully');
	
}



?>

<?php view('loginheader', ['title' => 'Personal Details']) ?>




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

<?php }?>





<form action="adddetails.php" method="post" class="container" style="width: 450px;">
<br><br>
    <h1>Personal Details</h1>

    <div class="mb-3">
        <label class="form-label" for="name">Enter Your Name : </label>
        <input class="form-control" type="text"  name="name" id="name" value="<?= $inputs['name'] ?? '' ?>"  placeholder="<?php echo $_SESSION['name'];  ?>" disabled>
        <div style="color:red;"><small><?= $errors['name'] ?? '' ?></small></div>
    </div>

    <div class="mb-3">
        <label class="form-label" for="email">Enter Your Email:</label>
        <input class="form-control" type="email" name="email" id="email" value="<?= $inputs['email'] ?? '' ?>"  placeholder="<?php if(isset($_SESSION['email'])){
                                                                                                                                echo $_SESSION['email']; } else { } ?>" required>
        <div style="color:red;"><small style="text-color:red"><?= $errors['email'] ?? '' ?></small></div>
    </div>

    <div class="mb-3">
        <label class="form-label" for="phone">Enter Your Phone : </label>
        <input class="form-control" type="tel"  name="phone" id="phone" value="<?= $inputs['phone'] ?? '' ?>" pattern="[0-9]{10}" placeholder="<?php if(isset($_SESSION['phone'])){
                                                                                                                                                echo $_SESSION['phone']; } else { } ?>" required>
        <div style="color:red;"><small><?= $errors['phone'] ?? '' ?></small></div>
        <p style="color:cadetblue;">ex - 0712233456</p>
    </div>

    <button type="submit" name="update" class="btn btn-primary">Update</button> <br><br>

    </form>




<?php view('footer') ?>
