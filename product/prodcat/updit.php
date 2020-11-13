<?php

    $conn = mysqli_connect("localhost", "root", "", "project2020");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if ($_POST["name"]==""){
        $name=$_POST["n"];
    }
    else{
        $name=$_POST["name"];
    }

    if ($_POST["pid"]==""){
        $p=$_POST["id"];
    }
    else{
        $p=$_POST["pid"];
    }
    
    $sql = "UPDATE  product_category SET prod_cat_id='$p' , name = '$name' WHERE prod_cat_id = ".$_POST['id']."";
    
    if (mysqli_query($conn,$sql))
        header("refresh:1; url=http://localhost/project2020/product/product_cat.php");
    else{
        echo "Update Failed";
        header("refresh:3; url=http://localhost/project2020/product/product_cat.php");
    }    

?> 