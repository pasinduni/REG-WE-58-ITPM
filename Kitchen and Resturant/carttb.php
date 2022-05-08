<?php 
    if(isset($_POST["cart"])) 
    {
        if(isset($_SESSION["shopping_cart"]))
        {
            $item_array_id = array_column($_SESSION["shopping_cart"], "id");
            if(!in_array($_GET["fid"], $item_array_id))
            {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array (
                    'id'    => $_GET["fid"],
                    'fitem' => $_POST["fitem"],
                    'fdescription' => $_POST["fdescription"],
                    'fprice' => $_POST["fprice"]
                );
                $_SESSION["shopping_cart"][$count] = $item_array;

            }
            else
            {
                echo '<script> alert("Item Already Added")</script>';
                echo '<script> window.location="view.php"</script>';
            }
        }
        else
        {
            $item_array = array (
                'id'    => $_GET["fid"],
                'fitem' => $_POST["fitem"],
                'fdescription' => $_POST["fdescription"],
                'fprice' => $_POST["fprice"]
            );
            $_SESSION["shopping_cart"] [0] = $item_array;

        }
    }

    if(isset($_GET["action"]))
    {
        if($_GET["action"] == "delete")
        {
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                if ($values["id"]  == $_GET["fid"])
                {
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script> alter("Item Removed") </script>';
                    echo '<script> window.location="view.php"</script>';
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> CART </title>

        <link rel="stylesheet" href="view.css">
    </head>

    <body>

        <div class="container">

                <form action="view.php" method="POST">
                <button type="button" name="cart" class="cart-btn" id="cart-btn">
                    <input class="cart" type="image" src="pictures/cart.png">
                </button>
                </form>

        </div>         

         <div id="totalcontent">
            <table>
                <thead>
                   
                    <th> Item </th>
                    <th> Description </th>
                    <th> Price </th>
                    <th> Quantity </th>
                    <td> Remove </td>
                </thead>
    
                <tbody>


                    <?php 
                        if(!empty($_SESSION["shopping_cart"]))
                        {
                            $total = 0;
                            foreach ($_SESSION["shopping_cart"] as $keys => $values)
                            {
                    ?>   

                                <tr>
                                <td> <?php echo $row['fitem']; ?> </td>
                                <td> <?php echo $row['fdescription']; ?> </td>
                                <td> <?php echo $row['fprice']; ?> </td>
                                <td> <?php echo number_format ($values["fquantity"] * $values["fprice"], 2) ?> </td>
                                <td> <a href="view.php?delete&id=<?php echo $values["fid"]; ?>"><span class="text-danger">Remove</span></a></td>
                                </tr>
                    
                    <?php
                            $total = $total + ($value["fquantity"] * $value["fprice"]);
                            }
                    ?>

                    <tr>

                            <td colspan="3" align="right"> Total </td>
                            <td align="right">$ <?php echo number_format($total, 2);?> </td>

                    </tr>

                    <?php
                        }
                    ?>                  


                </tbody>
            </table>

            

        </div>


        <div class="total"> 
            <a> Total Rs :  </a>
        </div>

    </body>
</html>