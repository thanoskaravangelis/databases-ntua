<?php

    $conn = mysqli_connect("localhost", "root", "", "project2020");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $p=$_GET["p"];
    $sql = "DELETE  FROM customer_phones WHERE phone_number = '$p'";

    
    if (mysqli_query($conn,$sql))
        header("refresh:1; url=http://localhost/project2020/customer/phones/customer_phones.php");
    else{
        echo "Delition Failed";
        header("http://localhost/project2020/customer/phones/customer_phones.php");
    }    

?> 