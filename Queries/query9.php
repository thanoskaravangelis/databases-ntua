<html>
    <head>
        <title>
            Our Queries
        </title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

<body>
    <div class="welcome">
        <h1><em> Our 2nd Query </em></h1>
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
                <li><a href="http://localhost/project2020/Queries/query4.php">Query 4</a></li>
                <li><a href="http://localhost/project2020/Queries/query5.php">Query 5</a></li>
                <li><a href="http://localhost/project2020/Queries/query6.php">Query 6</a></li>
                <li><a href="http://localhost/project2020/Queries/query7.php">Query 7</a></li>
                <li><a href="#">Our Queries</a>
                    <div class="subq">
                        <ul>
                            <li><a href="http://localhost/project2020/Queries/query8.php">Our Query 1</a></li>
                            <li  class="active"><a href="http://localhost/project2020/Queries/query9.php">Our Query 2</a></li>
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
        <h3>Task : Find the percentage of each age group visiting our shop every hour</h3>
    </div>    


    <table>
        <tr>
            <th>Total Transactions</th>
            <th>Total income</th>
            <th>Store ID</th>
            <th>Address</th>
            <th>City</th>
            <th>Postal Code</th>
        </tr>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "project2020");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT DISTINCT COUNT(table1.stores_store_id) OVER (PARTITION BY table1.stores_store_id) as occurances , 
                    SUM(table1.total_amount) OVER (PARTITION BY stores_store_id) as sums ,
                    table1.stores_store_id,table1.street,table1.number,table1.city,table1.postal_code FROM
                    (SELECT stores_store_id,total_amount, s.street, s.number ,s.city, s.postal_code,s.square_meters FROM transaction
                    INNER JOIN stores s
                    WHERE stores_store_id = store_id
                    ORDER BY stores_store_id) table1
                    ORDER BY occurances DESC;";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["occurances"]. "</td><td>" . $row["sums"] . "</td><td>". $row["stores_store_id"] . "</td><td>"
                    . $row["street"] . "&nbsp".$row["number"]."</td><td>". $row["city"] . "</td><td>". $row["postal_code"]. "</td></tr>";
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
        <p>SELECT DISTINCT COUNT(table1.stores_store_id) OVER (PARTITION BY table1.stores_store_id) as occurances , </p>
        <p>SUM(table1.total_amount) OVER (PARTITION BY stores_store_id) as sums ,</p>
        <p>table1.stores_store_id,table1.street,table1.number,table1.city,table1.postal_code FROM</p>
        <p>(SELECT stores_store_id,total_amount, s.street, s.number ,s.city, s.postal_code,s.square_meters </p>
        <p>FROM transaction</p>
        <p>INNER JOIN stores s</p>
        <p>WHERE stores_store_id = store_id</p>
        <p>ORDER BY stores_store_id) table1</p>
        <p>ORDER BY occurances DESC;</p>
    </div>
    <br><br><br><br><br><br>

</body>
</html>