<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/addlogin.php';
//require_login();

?>

<?php view('loginheader', ['title' => 'Add Login']) ?>





<?php //if ($_SESSION['role'] == 'admin') {?>



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
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>


<form action="addlogin.php" method="post" enctype="multipart/form-data" class="container" style="width: 450px;">
<br><br><br><br>


    <h1>Add Login</h1>

    <div class="mb-3 mt-3">
        <label class="form-label" for="name">name : </label>
        <input class="form-control" type="text"  name="name" id="name" value="<?= $inputs['name'] ?? '' ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="username">username : </label>
        <input class="form-control" type="text"  name="username" id="username" value="<?= $inputs['username'] ?? '' ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="password">Password : </label>
        <input class="form-control" type="password"  name="password" id="password" value="<?= $inputs['password'] ?? '' ?>" required>
    </div>


    <div class="mb-3">
      <div class="mb-3">
      <label class="form-label" for="designation">Designation :</label>
      </div>
        <select class="form-select" name="designation" id="designation" value="<?= $inputs['designation'] ?? '' ?>" required>
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
        <select class="form-select" name="role" id="role" value="<?= $inputs['role'] ?? '' ?>" required>
          <option selected>Choose...</option>
          <option value="admin">Admin</option>
          <option value="manager">Manager</option>
          <option value="other">Other</option>
         </select>
     </div>


    <button type="submit" class="btn btn-primary" name="save">Add</button> <br><br>

</form>

<?php // }?>

<?php view('footer') ?>
