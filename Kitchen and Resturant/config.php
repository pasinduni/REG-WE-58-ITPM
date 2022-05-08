<?php
  
    //connection
    $conn = new mysqli('localhost', 'root', '', 'parallel_shine');

    //checking for errors
    if (!$conn) {
        die (mysqli_error($conn));
    }

?>