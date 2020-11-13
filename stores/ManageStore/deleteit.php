<?php

    $conn = mysqli_connect("localhost", "root", "", "project2020");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "DELETE  FROM stores WHERE store_id = '$_GET[id]'";
    $sql2 = "DELETE  FROM store_phones WHERE store_id = '$_GET[id]'";

    
    if (mysqli_query($conn,$sql) and mysqli_query($conn,$sql2))
        header("refresh:1; url=store_del.php");
    else{
        echo "Delition Failed";
        header("stores.php");
    }    

?>    