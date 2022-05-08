<?php

	// Create connection
	$conn = mysqli_connect("localhost", "root", "", "parallel_shine");
	$sql = "SELECT * FROM supplier WHERE name LIKE '%".$_POST['name']."%'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0){
		while ($row=mysqli_fetch_assoc($result)) {
			echo "	<tr>
						<td>".$row['id']."</td>
						<td>".$row['name']."</td>
						<td>".$row['address']."</td>
						<td>".$row['phone']."</td>
						<td>".$row['email']."</td>
						<td>".$row['item']."</td>
					</tr>";
		}
	}
	else{
		echo "<td>No result's found</td>";
	}

?>
