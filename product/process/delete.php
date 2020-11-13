<html>
    <head>
        <title>
            Products
        </title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    

<body>
    <div class="welcome">
        <h1><em> Our Products! <em></h1>
        </div>
    <nav>
        <ul class="first_bar">
            <li><a href="#">Menu</a>
            <ul class="nav-links">
                    <br>
                    <li><a href="http://localhost/project2020/stores/stores.php">Stores</a></li>
                    <li><a href="http://localhost/project2020/customer/customer.php">Customers</a></li>
                    <li class="active"><a href="http://localhost/project2020/product/product.php">Products</a></li>
                    <li><a href="http://localhost/project2020/product/product_cat.php">Prod.Categories</a></li>
                    <li><a href='http://localhost/project2020/transactions/transactions.php'>Transactions</a></li>
                    <li><a href='http://localhost/project2020/transactions/contains.php'>Contains</a></li>
                    <li><a href='http://localhost/project2020/stores/Info/provides.php'>Provides</a></li>
                    <li><a href='http://localhost/project2020/stores/Info/offers.php'>Offers</a></li>
                    <li><a href='http://localhost/project2020/older_prices/older_prices.php'>Pricing History</a></li>
                </ul>
            </li>    
            <li><a href='#'>Queries</a>
            <ul class="queries">
                <br>
                <li><a href="http://localhost/project2020/Queries/query1/input.php">Query 1</a></li>
                <li><a href="http://localhost/project2020/Queries/query2/query2.php">Query 2</a></li>
                <li><a href="http://localhost/project2020/Queries/query3.php">Query 3</a></li>
                <li><a href="http://localhost/project2020/Queries/query4.php">Query 4</a></li>
                <li><a href="http://localhost/project2020/Queries/query5.php">Query 5</a></li>
                <li><a href="http://localhost/project2020/Queries/query6.php">Query 6</a></li>
                <li><a href="http://localhost/project2020/Queries/query7.php">Query 7</a></li>
                <li><a href="#">Our Queries</a>
                    <div class="subq">
                        <ul>
                            <li><a href="http://localhost/project2020/Queries/query8.php">Our Query 1</a></li>
                            <li><a href="http://localhost/project2020/Queries/query9.php">Our Query 2</a></li>
                        </ul>
                    </div>    
                </li>        
                </ul>
            </li>
            <li><a href='http://localhost/project2020/main/about.php'>About us</a></li>
            <li><a href='#'>Views</a>
                <ul class="view">
                <br>
                <li><a href="http://localhost/project2020/views/updatable.php">Updatable View</a></li>
                <li><a href="http://localhost/project2020/views/unupdatable.php">Unupdatable View</a></li>
                </ul>
            </li>
            <li><a href="http://localhost/project2020/main/index.php">Home Page</a></li>
        </ul>    

    </nav>
    
    <div class="txt">
        <h3>Product Management</h3>
    </div>  

    <div class="menu">
        <li><a href="http://localhost/project2020/product/product.php">View</a></li>
        <li><a href="http://localhost/project2020/product/process/update.php">Update</a></li>
        <li><a href="http://localhost/project2020/product/process/insert.php">Insert</a></li>
        <li class="active"><a href="http://localhost/project2020/product/process/delete.php">Delete</a></li>
    </div>   

	<br><br>
    <table>
    <tr>
        <th>Barcode</th>
        <th>Price</th>
        <th>Brand Name</th>
        <th>Name</th>
        <th>Product Category</th>
        <th>Delete</th>
    </tr>
    <?php
        $conn = mysqli_connect("localhost", "root", "", "project2020");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM product ORDER BY product_category_prod_cat_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                $x=$row["barcode"];
                echo "<tr><td><a href='http://localhost/project2020/older_prices/older_prices2.php?bar=".$x."'>" . $row["barcode"]. "</a></td><td>" . $row["price"] . "</td><td>"
                . $row["brand_name"]. "</td><td>" . $row["name"] ."</td><td>" . $row["product_category_prod_cat_id"] . "</td><td>
                <a href='http://localhost/project2020/product/process/deleteit.php?bar=".$row["barcode"]."'>Delete</a></td></tr>";
            }
            echo "</table>";
        } 
        else { 
            echo "0 results found"; 
        }
        $conn->close();
    ?>
	<br><br><br>

</body>
</html>