<?php
    include "config.php";

        if (isset($_POST['submit'])) {
            $Name = $_POST['Name'];
            $Quantity = $_POST['Quantity'];
            $Price = $_POST['Price'];

        $sql = "INSERT INTO `item`(`Name`, `Quantity`, `Price`) VALUES ('$Name','$Quantity','$Price')";
    
        $result = $conn->query($sql);
        if ($result == TRUE) {
            header('location:supRead.php');
        }else{
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>    
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    
    <style>
        h1{
            margin-bottom: 30px;
            font-size: 30px;
        }
        .form-label{
            font-size: 16px;
            font-weight: 500;
        }
        .btn-primary{
            width: 6%;
            font-size: 18px;
        }
    </style>
</head>

<body>  

    <div class="container" style="margin:80px 0px 0px 40%">
    <h1>&nbspAdd Item</h1>
        <form action="" method="POST">
                <div class="mb-4 w-25">
                    <label for="itemName" class="form-label">Item Name: </label>
                    <input type="text" class="form-control" id="itemName" name="Name">
                </div>
                <div class="mb-4 w-25">
                    <label for="itemQty" class="form-label">Quantity: </label>
                    <input type="text" class="form-control" id="itemQuantity" name="Quantity">
                </div>
                <div class="mb-4 w-25">
                    <label for="itemPrice" class="form-label">Item Price: </label>
                    <input type="number" class="form-control" id="itemPrice" name="Price">
                </div> 
                <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Add">
        </form>
    </div>
</body>
</html>