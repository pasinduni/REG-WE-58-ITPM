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
    <title>Generate Report</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style type="text/css" media="print">
        @media print{
            .btn-lg, .btn-lg *{
                display: none !important;
            }
            #search, #search *{
                display: none !important;
            }
        }
    </style>
    <style>
        body{
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
        }
        #search{
            background-color: #807e7e71;
            border: none;
            width: 20%;
            padding: 4px;
            font-size: 18px;
            min-height: 100%;
            margin: 11px 0px 0px 0px;
            float: right;
        }
        #search::after{
            border: none;
        }
        h1{
            margin-top: 40px;
            margin-bottom: 8px;
            font-size: 3.5rem;
            font-weight: 500;
        }
        h3{
            margin-bottom: 29px;
        }
        .btn-primary{
            color: #ffffff;
            background-color: #2e14a1;
            border-radius: 5px;
            border: none;
            width: 10%;
            font-size: 20px;
            font-weight: 500;
            padding: 5px;
            text-decoration: none;
            margin: 15px 0px 10px 0px;
        }
        /* table,tr,th,td{
            border: 1px solid #a3a2a2c2;
        } */
        table{
            margin-top: 11px;
        }
        tr ,th{
            border-color: #a3a2a2c2;
            border-radius: 1px;
            text-align: center;
        }
        td{
            font-size: 18px;
            font-weight: 500;
        }
        thead{
            color: black;
            font-size: 18px;
        }
        tbody{
            background-color: #ffffff;
        }
  
        </style>
</head>

<body>
        <div class="container">
            <input type="form-control" id="search" type="search" placeholder="Search..." aria-label="Search">
            <h1>Report</h1>
            <h3>Report of Supplier Details</h3>
            <table class="table" id="ready">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Item</th>
                    </tr>
                </thead>
                <tbody id="output">
                    <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['item']; ?></td>
                            </tr>
                    <?php     
                            }   
                        }
                    ?>
                </tbody>
            </table>

           <button onclick="window.print()" class="btn btn-primary btn-lg" style="float:right;">Download</button>
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