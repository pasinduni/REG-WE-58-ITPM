<?php
include "config.php";

    	if (isset($_POST['update'])) {
			$type = $_POST['type'];
			$user_id = $_POST['id'];
			$status = $_POST['status'];
			$availability = $_POST['availability'];
			$reservation = $_POST['reservation'];
			$remarks = $_POST['remarks'];

			// update
			$sql = "UPDATE `room` SET `type`='$type',`status`='$status',`availability`='$availability',`reservation`='$reservation',`remarks`='$remarks' WHERE `id`='$user_id'";
			// execute the query
			$result = $conn->query($sql);

			if ($result == TRUE) {
				header('Location: roomRead.php');
			}else{
				echo "Error:" . $sql . "<br>" . $conn->error;
			}
		}
		
		if (isset($_GET['id'])) {
			$room_id = $_GET['id'];
			// get user data
			$sql = "SELECT * FROM `room` WHERE `id`='$room_id'";
			// execute the sql
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$type = $row['name'];
					$statuss = $row['status'];
					$availability = $row['availability'];
					$reservation  = $row['reservation'];
					$remarks = $row['remarks'];
					$id = $row['id'];
				}
	?>
<!DOCTYPE html>
<html lang="en">
	<head>
    	<link rel="stylesheet" type="text/css"  href="css/add.css">
    	<title>Update Room Details</title>
	</head>
	<body>
	<?php include 'headerBar.php';?>
		<h1>Update Room Details</h1>
			<form action="" method="post">
			<div class="container">
			<label for="name"> <h4>Enter Room Type: </h4></label><br>
				<div class="w-50">
					<input type="text" class="form-control" placeholder="Enter type" name="type" value="<?php echo $type; ?>" required></div>
					<input type="hidden" name="id" value="<?php echo $room_id; ?>">
					<label for="name"> <h4>Enter room Status: </h4></label><br>
				<div class="w-50">
					<input type="text" class="form-control" placeholder="Enter Status" name="status" value="<?php echo $status; ?>" required></div>
					<label for="name"> <h4>Enter Availability: </h4> </label><br>
				<div class="w-50">
					<input type="mobile" maxlength="10" minlength="10" class="form-control" placeholder="Enter details" name="availability" value="<?php echo $availability; ?>" required></div>
					<label for="name"> <h4>Enter Reservation Status: </h4></label><br>
				<div class="w-50">
					<input type="email" class="form-control" placeholder="Pending/Confirmed" name="reservation" value="<?php echo $reservation; ?>" required></div>
					<label for="name"> <h4>Additional Remarks: </h4></label><br>  
				<div class="w-50">
					<input type="item" class="form-control" placeholder="Enter details" name="remarks" value="<?php echo $remarks; ?>" required></div>
					<div class="btnset">
					<input type="submit" class="btn btn-primary" value="Update" name="update" >
			</div>
			</div>
			</form>
	</body>
</html>

<?php
	} 
	else{
		// If the 'id' value is not valid, redirect the user back to read.php page
		header('Location: roomRead.php');
	}
}
?>