<?php

$conn = mysqli_connect("localhost", "root", "", "project2020");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id=$_GET["bar"];
$sql = "DELETE FROM product WHERE barcode ='$id'";


if (mysqli_query($conn,$sql))
    header("refresh:1; url=http://localhost/project2020/product/process/delete.php");
else{
    echo "Delition Failed";
    header("refresh:2; url=http://localhost/project2020/product/product.php");
}    

?> 