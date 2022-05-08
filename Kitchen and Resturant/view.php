<?php

    include "headerBar.php";
    include "config.php";

    if(isset($_POST['search'])) {
        $searchq = $_POST['search'];
        $sql = "SELECT * FROM foods WHERE fitem LIKE '%$searchq%'";
    }else 
    $sql = "SELECT * FROM foods ";

    $result = $conn -> query($sql);
    

    if(isset($_POST["foods"])) {
        header ('Location:view.php');
    }

    if(isset($_POST["beverage"])) {
        header ('Location:bview.php');
    }

    if(isset($_POST["dessert"])) {
        header ('Location:dview.php');
    }

    if(isset($_POST["cart"])) {
        header ('Location:carttb.php');
    }

    if(isset($_POST["add"])) {
        header ('Location:create.php');
    }


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Select Food Item </title>

        <link rel="stylesheet" href="view.css">
    </head>

    <body>


    <div>
        <div class="container">

            <div class="link-container">
                <b><a class="page" name="foods" href="view.php" target="_blank"> Foods </a></b>
                <b><a class="page" name="beverage" href="bview.php" target="_blank"> Beverage </a></b>
                <b><a class="page" name="dessert"  href="dview.php" target="_blank"> Desserts </a></b>
            </div>


            <form method="POST" action="view.php">
            <div class="wrapper">
                <div class="search-container">
                    <input class="input" type="text" name="search" placeholder="Search"/>
                    <input class="search" type="image" src="pictures/search.png"/>
                </div>
            </div>
            </form>
            

                    
                    <form action="carttb.php" method="POST">
                        <button type="button" name="cart" class="cart-btn" id="cart-btn">
                        <input class="cart" name="cart" type="image" src="pictures/cart.png">
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
                    <th> Edit/Delete </th>
                </thead>
    
                <tbody >

                <?php

                    if($result -> num_rows > 0) {
                        while($row = $result -> fetch_assoc()) {  

                ?>

                <tr>
                    <td> <?php echo $row['fitem']; ?> </td>
                    <td> <?php echo $row['fdescription']; ?> </td>
                    <td> <?php echo $row['fprice']; ?> </td>
                    <td> <input class='text-center' type="number" value='$value[fquantity]' min='0' max='50'> </td>
                    
                    <td>
                    <form action="edit.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['fid'] ?>">
                        <button type="submit" name="edit" class="btn-btn-primary" id="edit"> EDIT </button> 
                    </form>

                    <form action="delete.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['fid'] ?>">
                        <button type="submit" name="delete" class="btn-btn-primary" id="del"> DELETE </button>
                    </form>
                    
                    </td>
                </tr>

                <?php

                        }
                    }
                    else
                    {
                        echo "No record found!";
                    }

                ?>

                </tbody>

            </table>

            <form method="POST">
                <button type="submit" class="btn_btn-primary" name="add" id="add"> ADD </button>
            </form>
            
            <a> Total Rs :  </a>
            

        </div>

        </div>

    </body>

</html>