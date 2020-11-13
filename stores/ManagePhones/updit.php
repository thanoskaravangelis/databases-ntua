<?php

    $conn = mysqli_connect("localhost", "root", "", "project2020");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $phone=$_POST["phone"];
    $p=$_POST["old"];
    $sql = "UPDATE  store_phones SET phone_number=".$phone." WHERE phone_number = '$p'";

    
    if (mysqli_query($conn,$sql))
        header("refresh:1; url=http://localhost/project2020/stores/store_phones.php");
    else{
        echo "Delition Failed";
        header("http://localhost/project2020/stores/store_phones.php");
    }    

?> 