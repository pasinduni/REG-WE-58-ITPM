<?php

require __DIR__ . '/../src/bootstrap.php';

$conn = mysqli_connect("localhost", "root", "","itpm");

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



<form action="srchmember.php" method="POST">
<center><h3>Search Database</h3></center>
<center><table>
<tr>
	<td>Search</td>
	<td><input type="text" name="name" size="100"></td>
	<td><input type="submit" name="submit"></td>
</tr>
</table></center>
</form>

<br><br>

<div class="container">
	<div class="container-fluid" style="margin: auto; text-align: center; background-color: cornflowerblue; width: 100%; padding: 10px;">
		<h3 style="color:white"> Members  </h3>
		
	</div>
<table id="demo" class="table table-bordered">
<thead>
<tr>
<td>Name</td>
<td>Email</td>
<td>Phone</td>
<td>Designation</td>
<td>Options</td>
</tr>
</thead>
<tbody>
<?php

if($_REQUEST['submit']){
$name = $_POST['name'];

if(empty($name)){
	$make = '<h4>You must type a word to search!</h4>';
}else{
	$make = '<h4>No match found!</h4>';
	$sele = "SELECT * FROM users WHERE name LIKE '%$name%'";
	$result = mysqli_query($conn,$sele);
	
	if($row = mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
    echo  '<tr>';

    echo '<td>'.$row['name'].'</td>';
    echo '<td>'.$row['email'].'</td>';
    echo '<td>'.$row['phone'].'</td>';
    echo '<td>'.$row['designation'].'</td>';
    echo "<td> <a href=\"delete.php?id=$row[id]\">Delete</a></td>";		
	}
}else{
echo'<h2> Search Result</h2>';

print ($make);
}
mysqli_free_result($result);
mysqli_close($conn);
}
}
?>
</tbody>
</table>
</div>

<?php }?>


<?php view('footer') ?>


