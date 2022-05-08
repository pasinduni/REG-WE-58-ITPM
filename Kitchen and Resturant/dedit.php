<?php
    include "config.php";
    include "headerBar.php";

    if(isset($_POST["dupdate"])) {
        header ('Location:dview.php');
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="create.css">
    </head>
    <body>


        <?php

            $id = $_POST['id'];

            $query = "SELECT * FROM dessert WHERE did = $id";
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
                            <input type="hidden" name="id" value="<?php echo $row['did'] ?>">
                        <p> <label for="name"> Item: </label> </p>
                        <p> <input type="text" id="ilable" value="<?php echo $row['ditem'] ?>" placeholder="Enter the Item Name" name="ditem"> </p>
                    
                        <p> <label for="description"> Description: </label> </p>
                        <p> <input type="text" id="ilable" value="<?php echo $row['ddescription'] ?>" placeholder="Enter the Item Description" name="ddescription"> </p>

                        <p> <label for="name"> Price Rs: </label> </p>
                        <p> <input type="text" id="iname" value="<?php echo $row['dprice'] ?>" placeholder="Enter the Item Price" name="dprice"> </p>

                        <p> <button type="submit" name="dupdate" class="subbtn"> CONFIRM </button> </p>
                   
                        </form>

                        <?php
    

                                if(isset($_POST['dupdate']))
                                {
                                    $ditem = $_POST['ditem'];
                                    $ddescription = $_POST['ddescription'];
                                    $dprice = $_POST['dprice'];

                                    $query = "UPDATE dessert SET ditem='$ditem', ddescription='$ddescription', dprice='$dprice' WHERE did='$id' ";
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

