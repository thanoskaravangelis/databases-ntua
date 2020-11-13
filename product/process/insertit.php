
<?php

    
    $name=$_POST["name"];
    $bar=$_POST["barcode"];
    $price=$_POST["price"];
    $brand=$_POST["brand"];
    $conn = mysqli_connect("localhost", "root", "", "project2020");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $prod_cat=$_POST["prod_cat"];


    $result = mysqli_query($conn, "INSERT INTO product VALUES ('$bar', '$price', '$brand', '$name', '$prod_cat')");


    if ($result){
        header("refresh:1 ; url=http://localhost/project2020/product/product.php");
    }
    else{
        echo "Insertion Failed";
        header("refresh:3; url=http://localhost/project2020/product/product.php");
    }    
?>    