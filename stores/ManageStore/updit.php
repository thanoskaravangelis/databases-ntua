<?php

    if ($_GET['square_meters']==""){
        $square_meters=floatval($_GET['sqr']);
    }
    else{
        $square_meters=floatval($_GET['square_meters']);
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
        $postal_code = $_GET["post"];
    }
    else{
        $postal_code=$_GET["postal_code"];
    }


    $id=$_GET['id'];
    $conn = mysqli_connect("localhost", "root", "", "project2020");
  
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = mysqli_query($conn, "UPDATE stores  SET square_meters='$square_meters', street='$street',number='$number', postal_code='$postal_code', city='$city' WHERE store_id='$id'");
    
    if ($result){
        header("refresh:1 ; url=http://localhost/project2020/stores/ManageStore/store_update.php");
    }
    else{
        echo "Update Failed";
        header("refresh:3; url=http://localhost/project2020/stores/stores.php");
    }    
 
    

?>    