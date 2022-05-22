<?php 
include "config.php";

    //get data from users table
    $sql = "SELECT * FROM supplier";
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

            <input type="form-control" id="search" type="search" placeholder="Search..." aria-label="Search">

            <h1>Supplier Details</h1>

            <button class="btn btn-primary my-5"><a href="supAdd.php">+ Add</a></button>
            <button class="btn btn-primary my-5" style="float:right; "><a href="itemView.php">Items</a></button>
            <button class="btn btn-primary my-5" style="float:right; margin-right:5px"><a href="supReport.php">Report</a></button>
      
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Item</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody id="output">
                    <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['item']; ?></td>
                                <td><a class="btn btn-success-edit" href="supUpdate.php?id=<?php echo $row['id']; ?>">Update</a>&nbsp;
                                
                                <a class="btn btn-danger" href="supDelete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                            </tr>
                    <?php     
                            }   
                        }
                    ?>
                </tbody>
            </table>
        </div>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#search").keypress(function(){
                        $.ajax({
                            type:'POST',
                            url:'search.php',
                            data:{
                            name:$("#search").val(),
                            },
                            success:function(data){
                            $("#output").html(data);
                            }
                        });
                    });
                });
            </script>
    </body>
</html>