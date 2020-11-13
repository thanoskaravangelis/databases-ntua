<?php

$conn = mysqli_connect("localhost", "root", "", "project2020");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id=$_GET["pc"];
$sql = "DELETE FROM product_category WHERE prod_cat_id='$id'";


if (mysqli_query($conn,$sql))
    header("refresh:1; url=http://localhost/project2020/product/product_cat.php");
else{
    echo "Delition Failed";
    header("refresh:2; url=http://localhost/project2020/product/product_cat.php");
}    

?> 