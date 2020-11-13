<html>
    <head>
        <title>
            Queries
        </title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

<body>
    <div class="welcome">
        <h1><em> Query 4 <em></h1>
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
                <li class="active"><a href="http://localhost/project2020/Queries/query4.php">Query 4</a></li>
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

    <div class="tab_info">
        <h3>Task : Find the most popular product position in each store</h3>
    </div>    


    <table>
        <tr>
            <th>Store ID</th>
            <th>Aisle</th>
            <th>Shelf</th>
            <th>Product Name</th>
            <th>Product Barcode</th>
            <th>Products Bought per Store Position</th>
        </tr>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "project2020");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = " SELECT store_id,aisle,shelf,name,barcode,sum_of_prods FROM 
                    (SELECT distinct off.store_id,p.barcode,p.name,off.aisle,off.shelf,sum(c.pieces) over(partition by p.barcode,c.transaction_stores_store_id) as sum_of_prods 
                    from product p
                    join contains c 
                    join offers off
                    where c.product_barcode = off.barcode and off.barcode = p.barcode and c.product_barcode = p.barcode and c.transaction_stores_store_id=off.store_id
                    order by sum_of_prods DESC ) table2
                    group by table2.store_id
                    order by store_id ";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["store_id"]. "</td><td>" . $row["aisle"] . "</td><td>"
                    . $row["shelf"]."</td><td>".$row["name"] . "</td><td>".$row["barcode"] . "</td><td>" .$row["sum_of_prods"]
                    . "</td></tr>";
                }
            echo "</table>";
            } 
            else { 
                echo "0 results found"; 
            }
            $conn->close();
        ?>
    </table>

    <div class="above_views">
        <h5>Our Query For the task:</h5>
        <p>SELECT store_id,aisle,shelf,name,barcode,sum_of_prods FROM</p>
        <p>(SELECT DISTINCT off.store_id,p.barcode,p.name,off.aisle,off.shelf,SUM(c.pieces) OVER(PARTITION by p.barcode,c.transaction_stores_store_id) AS sum_of_prods</p>
        <p>FROM product p FROM contains c JOIN offers off</p>
        <p>WHERE c.product_barcode = off.barcode AND off.barcode = p.barcode AND c.product_barcode = p.barcode AND c.transaction_stores_store_id=off.store_id</p>
        <p>ORDER BY sum_of_prods DESC ) table2 GROUP BY table2.store_id ORDER BY store_id</p>
    </div>
    <br><br><br><br><br><br>

</body>
</html>