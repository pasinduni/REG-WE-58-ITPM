<?php

include "config.php";

if(isset($_POST['delete']))
{
    $id = $_POST['id'];

    $query = "DELETE FROM foods WHERE fid='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("location:foods.php");
    }
    else
    {
        echo '<script> alert("Data Deleted"); </script>';
    }
}



if(isset($_POST['bdelete']))
{
    $id = $_POST['id'];

    $query = "DELETE FROM beverage WHERE bid='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("location:beverage.php");
    }
    else
    {
        echo '<script> alert("Data Deleted"); </script>';
    }
}



if(isset($_POST['ddelete']))
{
    $id = $_POST['id'];

    $query = "DELETE FROM dessert WHERE did='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("location:dessert.php");
    }
    else
    {
        echo '<script> alert("Data Deleted"); </script>';
    }
}

?>