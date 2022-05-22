<?php 
 include "config.php";

 if(isset($_POST["cart"])) {
    header ('Location:foods.php');
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
            

            
            <form action="foods.php" method="POST">
            <a href="foods.php" class="btn">         
            <svg xmlns="http://www.w3.org/2000/svg" class="cart" name="cart" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>                    </button>
            </a>
            </form>

    </div>


    <div class="totalcontent">
    <h1>Foods</h1>
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
        <tr>
                    <th> </th>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    </tr>
               
        </tbody>

    </table>

        </div>

        
    </body>
</html>

