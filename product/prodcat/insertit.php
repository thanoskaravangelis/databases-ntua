<?php

    $conn = mysqli_connect("localhost", "root", "", "project2020");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $p=$_POST["prod"];

    $sql = "INSERT INTO  product_category (name) VALUES ( '$p')";

    
    if (mysqli_query($conn,$sql))
        header("refresh:1; url=http://localhost/project2020/product/product_cat.php");
    else{
        echo "Insertion Failed";
        header("refresh:3 ; url=http://localhost/project2020/product/product_cat.php");
    }    

?> 