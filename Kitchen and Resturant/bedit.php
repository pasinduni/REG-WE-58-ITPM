<?php
    include "config.php";
    include "headerBar.php";

    if(isset($_POST["bupdate"])) {
        header ('Location:bview.php');
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

            $query = "SELECT * FROM beverage WHERE bid = $id";
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
                            <input type="hidden" name="id" value="<?php echo $row['bid'] ?>">
                        <p> <label for="name"> Item: </label> </p>
                        <p> <input type="text" id="ilable" value="<?php echo $row['bitem'] ?>" placeholder="Enter the Item Name" name="bitem"> </p>
                    
                        <p> <label for="description"> Description: </label> </p>
                        <p> <input type="text" id="ilable" value="<?php echo $row['bdescription'] ?>" placeholder="Enter the Item Description" name="bdescription"> </p>

                        <p> <label for="name"> Price Rs: </label> </p>
                        <p> <input type="text" id="iname" value="<?php echo $row['bprice'] ?>" placeholder="Enter the Item Price" name="bprice"> </p>

                        <p> <button type="submit" name="bupdate" class="subbtn"> CONFIRM </button> </p>
                   
                        </form>

                        <?php
    

                                if(isset($_POST['bupdate']))
                                {
                                    $bitem = $_POST['bitem'];
                                    $bdescription = $_POST['bdescription'];
                                    $bprice = $_POST['bprice'];

                                    $query = "UPDATE beverage SET bitem='$bitem', bdescription='$bdescription', bprice='$bprice' WHERE bid='$id' ";
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

