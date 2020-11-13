<?php

    $square_meters=$_POST['square_meters'];
    $street=$_POST['street'];
    $number=$_POST['number'];
    $postal_code=$_POST['postal_code'];
    $city=$_POST['city'];
    $phone=$_POST['phone_number'];
    $phone2=$_POST['phone_number2'];
    $conn = mysqli_connect("localhost", "root", "", "project2020");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result1 = mysqli_query($conn, "INSERT INTO stores (operating_hours,square_meters, street, number, postal_code, city) VALUES  ('09:00-21:00', '$square_meters', '$street', '$number', '$postal_code', '$city')");
    $result2= mysqli_query($conn, "INSERT INTO store_phones VALUES ('$phone', (SELECT store_id FROM stores WHERE street = '$street' AND number='$number'))");

    if ($phone2!=""){
        $result3= mysqli_query($conn, "INSERT INTO `project2020`.`store_phones`
        VALUES ('$phone2', (SELECT `store_id` FROM `project2020`.`stores` WHERE street = '$street' AND number='$number'))");
    }
    else{}
    if ($result1){
        header("refresh:1 ; url=http://localhost/project2020/stores/stores.php");
    }
    else{
        echo "Insertion Failed";
        header("refresh:3; url=http://localhost/project2020/stores/stores.php");
    }    
?>    
