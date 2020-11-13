<?php

    $name=$_POST["name"];
    $birth=$_POST["date_of_birth"];
    $street=$_POST['street'];
    $number=$_POST['number'];
    $postal_code=$_POST['postal_code'];
    $city=$_POST['city'];
    $fam=$_POST["fam"];
    $pet=$_POST["pet"];
    $phone=$_POST['phone_number'];
    $phone2=$_POST['phone_number2'];
    $conn = mysqli_connect("localhost", "root", "", "project2020");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result1 =mysqli_query($conn,"INSERT INTO customer (name,date_of_birth, street, number, postal_code, city, points, family_members, pet)
     VALUES  ('$name', '$birth', '$street', '$number', '$postal_code', '$city','0', '$fam', '$pet')");
    $result2=mysqli_query($conn, "INSERT INTO `project2020`.`customer_phones` 
    VALUES ('$phone', (SELECT card_number_ID FROM `project2020`.`customer` WHERE street='$street' AND number='$number'))");
    if ($phone2!=""){
        $result3=mysqli_query($conn, "INSERT INTO `project2020`.`customer_phones` 
    VALUES ('$phone2', (SELECT card_number_ID FROM `project2020`.`customer` WHERE street='$street' AND number='$number'))");
    }
    else{}

    if ($result1){
        header("refresh:1 ; url=http://localhost/project2020/customer/customer.php");
    }
    else{
        echo "Insertion Failed";
        header("refresh:3; url=http://localhost/project2020/customer/customer.php");
    }    


?>    