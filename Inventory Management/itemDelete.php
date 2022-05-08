<?php
    include "config.php";
        if(isset($_GET['Id'])){
            $Id = $_GET['Id'];
                // delete
                $sql  = "DELETE FROM `item` WHERE `Id`= '$Id'";
                // execute the query
                $result = $conn->query($sql);

                if ($result == TRUE) {
                    header('location:itemView.php');
                }else{
                    echo "Error:" . $sql . "<br>" . $conn->error;
                }
       }
?>