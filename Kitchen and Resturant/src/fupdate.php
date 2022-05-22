<?php
    include "config.php";
    include "headerBar.php";

    if(isset($_POST["update"])) {
        header ('Location:foods.php');
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../style/create.css">
    </head>
    <body>


        <?php

            $id = $_POST['id'];

            $query = "SELECT * FROM foods f WHERE fid = $id";
            $query_run = mysqli_query($conn, $query);

            if($query_run)
            {
                while($row = mysqli_fetch_array($query_run))
                {
                    ?>

                <div class="totalcontent">
                     <div class="frm">

                    <div class="heading">
                        <h1> Edit Items </h1>
                    </div>

                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['fid'] ?>">
                        <p> <label for="name"> Item: </label> </p>
                        <p> <input type="text" id="ilable" value="<?php echo $row['fitem'] ?>" placeholder="Enter the Item Name" name="fitem"> </p>
                    
                        <p> <label for="description"> Description: </label> </p>
                        <p> <input type="text" id="ilable" value="<?php echo $row['fdescription'] ?>" placeholder="Enter the Item Description" name="fdescription"> </p>

                        <p> <label for="name"> Price Rs: </label> </p>
                        <p> <input type="text" id="iname" value="<?php echo $row['fprice'] ?>" placeholder="Enter the Item Price" name="fprice"> </p>

                        <p> <button type="submit" name="update" class="subbtn"> CONFIRM </button> </p>
                   
                        </form>

                        <?php
    

                                if(isset($_POST['update']))
                                {
                                    $fitem = $_POST['fitem'];
                                    $fdescription = $_POST['fdescription'];
                                    $fprice = $_POST['fprice'];

                                    $query = "UPDATE foods SET fitem='$fitem', fdescription='$fdescription', fprice='$fprice' WHERE fid='$id' ";
                                    $query_run = mysqli_query($conn, $query);

                                    if($query_run)
                                    {
                                        echo '<script> alert("Data Updated"); </script>';
                                        
                                    }
                                    else
                                    {
                                        echo '<script> alert("data Not Updated"); </script>';
                                    }
                                }


                          ?>

                     </div>
                 </div>


                     <?php
                }
            }
            else
            {
                echo '<script> alert("No Record Found!"); </script>';
            }

        ?>

    </body>
</html>

