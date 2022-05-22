<?php

    include "config.php";
    include "headerBar.php";

    if(isset($_POST['search'])) {
        $searchq = $_POST['search'];
        $sql = "SELECT * FROM dessert WHERE ditem LIKE '%$searchq%'";
    }else 
    $sql = "SELECT * FROM dessert";
    $result = $conn -> query($sql);

    if(isset($_POST["add"])) {
        header ('Location:dcreate.php');
    }


?>


<!DOCTYPE html>
<html>
    <head>

    <link rel="stylesheet" href="../style/table.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>

    <div class="container">

        <div class="link-container">
            <b><a class="page" name="foods" href="foods.php" target="_blank"> Foods </a></b>
            <b><a class="page" name="beverage" href="beverage.php" target="_blank"> Beverage </a></b>
            <b><a class="page" name="dessert"  href="dessert.php" target="_blank"> Desserts </a></b>
        </div>

        <form method="POST" action="dessert.php">
            <div class="wrapper">
                <div class="search-container">
                    <input class="input" type="text" name="search" placeholder="Search"/>
                    <input class="search" type="image" src="pictures/search.png"/>
                </div>
            </div>
            </form>
            
            <form action="" method="POST">
            <a href="cart.php" class="btn">         
            <svg xmlns="http://www.w3.org/2000/svg" class="cart" name="cart" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>                    </button>
            </a>
            </form>

    </div>


    <div class="totalcontent">
    <h1>Desserts</h1>
    <table class="table table-striped">
  
        <thead>
            <tr>
            <th> Item </th>
                    <th> Description </th>
                    <th> Price </th>
                    <th> Quantity </th>
                    <th> Edit/Delete </th>
                </tr>
        </thead>
        <tbody>
        <?php

            if($result -> num_rows > 0) {
                while($row = $result -> fetch_assoc()) {  

            ?>

            <tr>
            <td> <?php echo $row['ditem']; ?> </td>
            <td> <?php echo $row['ddescription']; ?> </td>
            <td> <?php echo $row['dprice']; ?> </td>
            <td> <input class='text-center' type="number" value='$value[dquantity]' min='0' max='50'> </td>
            <td> 
                <form action="dedit.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['did'] ?>">
                <button type="submit" name="dedit" class="btn btn-primary" id="edit"> EDIT </button> 
            </form>

            <form action="delete.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['did'] ?>">
                <button type="submit" name="ddelete" class="btn btn-danger" id="del"> DELETE </button>
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

             <a href="dcreate.php" class="btn btn-primary" id="add">ADD</a>
    </div>

        
    </body>
</html>