<?php
    //linking config.php
    include "config.php";
    include "headerBar.php";

    //checking thet the submit button is pressed or not
    if (isset ($_POST['submit'])) {
        $ditem = $_POST['ditem'];
        $ddescription = $_POST ['ddescription'];
        $dprice = $_POST['dprice'];

    //sql query
    $sql = "INSERT INTO `dessert` (`did`, `ditem`, `ddescription`, `dprice`, `dquantity`) VALUES (NULL, '$ditem', '$ddescription', '$dprice', '')";

    //execute the query
    $result = $conn->query($sql);
    
    if ($result == TRUE) {
        echo "New Record Created Successfully";
    }
    else {
        echo "Error" . $sql . "<br>" .$conn->error;
    }

    //close the connection
    $conn->close();
}

if(isset ($_POST["submit"])) {
    header ('Location:dessert.php');
}

?>

<!-- html form -->
<!DOCTYPE html>

<head> 
    <link rel="stylesheet" href="../style/create.css">
</head>

<body>
<div class="totalcontent">
            <div class="frm">

                <div class="heading">
                    <h1> Add Items </h1>
                </div>

                <form action="" method="POST">

                    <p> <label for="name"> Item: </label> </p>
                    <p> <input type="text" id="ilable" placeholder="Enter the Item Name" name="ditem" required/> </p>
                    
                    <p> <label for="description"> Description: </label> </p>
                    <p> <input type="text" id="ilable" placeholder="Enter the Item Description" name="ddescription"> </p>

                    <p> <label for="name"> Price Rs: </label> </p>
                    <p> <input type="text" id="iname" placeholder="Enter the Item Price" name="dprice" required/> </p>

                    <p> <button type="submit" class="subbtn" name="submit"> CONFIRM </button> </p>

                </form>

            </div>
        </div>
</body>

</html>