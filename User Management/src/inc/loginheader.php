<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    



    <title><?= $title ?? 'Home' ?></title>
<style>

* {
  box-sizing: border-box;
}

body {
  margin: 0;
  style="background-color:darkred;"
}

/* Style the header */
.header {
  background-color: #f1f1f1;
  padding: 20px;
  text-align: center;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 15px;
}

.columnsar {
  float: left;
  width: 25%;
  padding: 15px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}


.homebtn {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  
  transition-duration: 0.4s;
  cursor: pointer;
}


.editbtn {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 15px;
 
  transition-duration: 0.4s;
  cursor: pointer;
}


.homebtn1 {
  background-color: crimson; 
  color: white; 
}

.logoutbtn {
  background-color: crimson; 
  color: white;
  border-radius: 8px; 
  padding: 2px 8px;
}


.homebtn1:hover {
  background-color: crimson;
  color: white;
}






/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width:600px) {
  .column {
    width: 100%;
  }
}

</style>

</head>
<body >
<main>
<nav class="navbar navbar-expand-sm  navbar-dark" style="background-color:cornflowerblue; ">
  <div class="container-fluid">

    <a href="addlogin.php" style="text-decoration:none"> <h3 style="color:white">Hotel Management System</h3> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        
      </ul>
      
      <form  class="d-flex">
        <p style="color:white">  
        <a href="adddetails.php" <i class='fas fa-user-alt' style='font-size:36px; padding:12px;'></i> </a>   
        
          <div style="padding: 5px 0; color:white">    <?= current_user() ?> <br><?= current_user_designation() ?>&nbsp;&nbsp; <br>
            <a href="logout.php"><button style=" color:white;" class="editbtn logoutbtn" type="button" >Logout</button></a>
          </div>
        </p>
      </form>
    </div>
    
  </div>
</nav>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php flash() ?>

