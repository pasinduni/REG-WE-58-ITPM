<?php 
include "config.php";

    //get data from users table
    $sql = "SELECT * FROM item";
    //execute the query
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" type="text/css"  href="css/read.css">
</head>

<body>

<?php include 'headerBar.php';?>

        <div class="container">
            <h1>Stored Items</h1>
            <button class="btn btn-primary my-5"><a href="itemAdd.php">+ Add</a></button>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price(Rs.)</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody Id="output">
                    <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $row['Id']; ?></td>
                                <td><?php echo $row['Name']; ?></td>
                                <td><?php echo $row['Quantity']; ?></td>
                                <td><?php echo $row['Price']; ?></td>
                                <td><a class="btn btn-danger" href="itemDelete.php?Id=<?php echo $row['Id']; ?>">Delete</a><td>
                            </tr>
                    <?php     
                            }   
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>