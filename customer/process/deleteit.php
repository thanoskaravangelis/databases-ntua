<?php

    $conn = mysqli_connect("localhost", "root", "", "project2020");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $x=$_GET["id"];
    $sql = "DELETE  FROM customer WHERE card_number_id = '$x'";
    $sql2 = "DELETE  FROM customer_phones WHERE card_number_id = '$x'";

    
    if (mysqli_query($conn,$sql) and mysqli_query($conn,$sql2))
        header("refresh:1; url=http://localhost/project2020/customer/process/del_form.php");
    else{
        echo "Delition Failed";
        header("refresh:3; url=http://localhost/project2020/customer/customer.php");
    }    

?>    