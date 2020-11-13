<?php

    if ($_GET['family']==""){
        $fam=$_GET['fam'];
    }
    else{
        $fam=$_GET['family'];
    }


    if ($_GET['street']==""){
        $street=$_GET['str'];
    }
    else{
        $street=$_GET['street'];
    }


    if ($_GET['number']==""){
        $number=$_GET['num'];
    }
    else{
        $number=$_GET['number'];
    }

    if ($_GET['city']==""){
        $city=$_GET['cit'];
    }
    else{
        $city=$_GET['city'];
    }

    if ($_GET["postal_code"] ==""){
        $postal_code = $_GET["pc"];
    }
    else{
        $postal_code=$_GET["postal_code"];
    }

    if ($_GET['points']==""){
        $points=$_GET['poi'];
    }
    else{
        $points=$_GET['points'];
    }

    if ($_GET["pet"] ==""){
        $pet = $_GET["pe"];
    }
    else{
        $pet=$_GET["pet"];
    }


    $id=$_GET['id'];
    $conn = mysqli_connect("localhost", "root", "", "project2020");
  
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = mysqli_query($conn, "UPDATE customer  SET street='$street',number='$number', postal_code='$postal_code', city='$city'
    , family_members='$fam', points= '$points', pet= '$pet' WHERE card_number_ID='$id'");
    
    if ($result){
        header("refresh:1 ; url=http://localhost/project2020/customer/process/upd_form.php");
    }
    else{
        echo "Update Failed";
        header("refresh:3; url=http://localhost/project2020/customer/customer.php");
    }    
?>    