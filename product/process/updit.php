<?php
    $barcode=$_GET["bar"];

    if ($_GET['barcode']==""){
        $new_bar=$_GET['bar'];
    }
    else{
        $new_bar=$_GET['barcode'];
    }


    if ($_GET['price']==""){
        $price=$_GET['pr'];
    }
    else{
        $price=$_GET['price'];
    }


    if ($_GET['brand_name']==""){
        $brand_name=$_GET['br'];
    }
    else{
        $brand_name=$_GET['brand_name'];
    }

    if ($_GET["name"]==""){
        $name=$_GET['n'];
    }
    else{
        $name=$_GET['name'];
    }

    if ($_GET["prod_cat"] ==""){
        $prod_cat = $_GET["pc"];
    }
    else{
        $prod_cat=$_GET["prod_cat"];
    }

    $conn = mysqli_connect("localhost", "root", "", "project2020");
  
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = mysqli_query($conn, "UPDATE product SET barcode='$new_bar',price='$price', product_category_prod_cat_id='$prod_cat', name='$name'
    , brand_name='$brand_name' WHERE barcode='$barcode'");
    
    if ($result){
        header("refresh:1 ; url=http://localhost/project2020/product/process/update.php");
    }
    else{
        echo "Update Failed";
        header("refresh:3; url=http://localhost/project2020/product/product.php");
    }    
?>    