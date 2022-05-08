<?php
    include "config.php";

    if(isset($_GET['id'])){
        $user_id = $_GET['id'];

        // delete
        $sql  = "DELETE FROM `supplier` WHERE `id`= '$user_id'";

        // execute the query
        $result = $conn->query($sql);
        if ($result == TRUE) {
            header('location:supRead.php');
    	}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
        }
    }
?>