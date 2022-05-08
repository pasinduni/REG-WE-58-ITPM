<?php

require __DIR__ . '/../src/bootstrap.php';
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
require_login();

$con = mysqli_connect("localhost","root","","itpm");
if (mysqli_connect_errno()) {
echo "Unable to connect to MySQL! ". mysqli_connect_error();
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
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>





<br><br>

<div class="container">
	<div class="container-fluid" style="margin: auto; text-align: center; background-color: cornflowerblue; width: 100%; padding: 10px;">
		<h3 style="color:white"> Login  </h3>
		
	</div>
<table id="demo" class="table table-bordered">
<thead>
<tr>
<td>Username</td>
<td>Role</td>
<td>Options</td>
</tr>
</thead>
<tbody>
<?php
$sqli = "SELECT * FROM `users` ORDER BY id DESC";
$res = mysqli_query($con, $sqli);
while($res = mysqli_fetch_array($result)) {
echo '<tr>';
echo '<td>'.$res['username'].'</td>';
echo '<td>'.$res['role'].'</td>';
echo "<td> <a href=\"updatelogin.php?id=$res[id]\">Update</a> <br> <a href=\"delete.php?id=$res[id]\">Delete</a></td>";		
echo '</tr>';
}
mysqli_close($con);
?>
</tbody>
</table>
</div>


<?php }?>

<?php view('footer') ?>