<?php
    include "config.php";

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $item = $_POST['item'];

        //write sql query
        $sql = "INSERT INTO `supplier`(`name`, `address`, `phone`, `email`, `item`) VALUES ('$name','$address','$phone','$email','$item')";
        //execute the query 
        $result = $conn->query($sql);
        if ($result == TRUE) {
           header('location:itemAdd.php');
        }else{
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css"  href="css/add.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Add Supplier Details</title>
  
</head>
<body>
<?php include 'headerBar.php';?>
<h1>Add Details</h1>
    <form action="" method="POST">
       <div class="container">

            <div class="w-50 my-3">
                <label for="name"> <h4>Enter Supplier Name: </h4></label>
                <input type="text" class="form-control" placeholder="Enter Name" name="name" required></div>

            <div class="w-50 my-3">
                <label for="name"> <h4>Enter Supplier Address: </h4></label>
                <input type="text" class="form-control" placeholder="Enter Address" name="address" required></div>
            
            <div class="w-50 my-3">
                <label for="name"> <h4>Enter Supplier Mobile Number: </h4> </label>
                <input type="tel" maxlength="10" minlength="10" class="form-control" placeholder="Enter Phone" name="phone" required></div>    

            <div class="w-50 my-3">
                <label for="name"> <h4>Enter Supplier Email: </h4></label>
                <input type="email" class="form-control" placeholder="Enter Email" name="email" required></div>  

            <div class="w-50 my-3">
                <label for="name"> <h4>Enter Item Name: </h4></label>     
                <input type="text" class="form-control" placeholder="Enter Item Provided" name="item" required></div>
            
                <div class="btnset">
                    <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Add">
                    <input type="reset" class="btn btn-primary" id="reset" name="reset" value="Reset">
                </div>
        </div>
        </div>
    </form>
</body>
</html>