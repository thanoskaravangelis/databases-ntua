<html>
    <head>
        <title>
            Transaction's Info
        </title>
        <link rel="stylesheet" href="style2.css" type="text/css">
    </head>

<body>
    <div class="welcome">
        <h1><em>Information of each Transaction <em></h1>
        </div>
    <nav>
        <ul class="first_bar">
            <li><a href="#">Menu</a>
                <ul class="nav-links">
                    <br>
                    <li><a href="http://localhost/project2020/stores/stores.php">Stores</a></li>
                    <li><a href="http://localhost/project2020/customer/customer.php">Customers</a></li>
                    <li><a href="http://localhost/project2020/product/product.php">Products</a></li>
                    <li><a href="http://localhost/project2020/product/product_cat.php">Prod.Categories</a></li>
                    <li><a href='http://localhost/project2020/transactions/transactions.php'>Transactions</a></li>
                    <li class="active"><a href='http://localhost/project2020/transactions/contains.php'>Contains</a></li>
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
    <table>
        <tr>
            <th>Transaction ID</th>
            <th>Product Name</th>
            <th>Barcode</th>
            <th>Pieces</th>
            <th>Product Category ID</th>
            <th>Store ID</th>
        </tr>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "project2020");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if (isset($_GET["x"])){

               ?> <div class="back">
			<a href="http://localhost/project2020/transactions/transactions.php"><button type="button" class="back">Back</button></a>
                </div>
                <?php 
                $x=$_GET["x"];
                $sql = "SELECT contains.*, product.name FROM contains, product 
                        WHERE contains.product_barcode = product.barcode AND contains.transaction_transaction_id='$x' 
                        ORDER BY contains.transaction_transaction_id; ";
            }    
            else{
                $sql = "SELECT * FROM contains c 
                        LEFT JOIN product p on c.product_barcode = p.barcode
                        ORDER BY c.transaction_transaction_id; ";    
            }
           ?> <br><br><?php
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["transaction_transaction_id"]."</td><td>" . $row["name"]. "</td><td>". $row["product_barcode"]. "&nbsp </td><td>"
                    . $row["pieces"]. "</td><td>" . $row["product_product_category_prod_cat_id"] ."</td><td>". $row["transaction_stores_store_id"] ."</td></tr>";
                }
            echo "</table>";
            } 
            else { 
                echo "0 results found"; 
            }
            $conn->close();
        ?>
    </table> 
    <br><br><br>   
</body>
</html>