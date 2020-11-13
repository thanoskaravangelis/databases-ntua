<html>
    <head>
        <title>
            Queries
        </title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

<body>
    <div class="welcome">
        <h1><em> Query 3 <em></h1>
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
                <li class="active"><a href="http://localhost/project2020/Queries/query3.php">Query 3</a></li>
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

    <div class="tab_info">
        <h3>Task : Find the most popular couple of products</h3>
    </div>    


    <table>
        <tr>
            <th>Barcode no1</th>
            <th>Product Name no1</th>
            <th>Barcode no2</th>
            <th>Product Name no2</th>
            <th>Times They Were Bought Together</th>
            <th>Total Pieces Bought From Both These Times</th>
        </tr>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "project2020");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT distinct table1.barcode1,table1.name1,table1.barcode2,table1.name2,count(table1.pieces1 + table1.pieces2) over (partition by table1.barcode1,table1.barcode2) as occurances,
                    sum(table1.pieces1 + table1.pieces2) over (partition by table1.barcode1,table1.barcode2) as sums from
                    (select DISTINCT c2.transaction_transaction_id,c2.product_barcode as barcode1,p2.name as name1,c2.pieces as pieces1,c1.product_barcode as barcode2,p1.name as name2,c1.pieces as pieces2 from contains as c2
                    inner join contains c1
                    inner join product p2
                    inner join product p1
                    where c1.transaction_transaction_id = c2.transaction_transaction_id and c2.product_barcode != c1.product_barcode 
                    and p2.barcode = c2.product_barcode and p1.barcode = c1.product_barcode and c2.product_barcode > c1.product_barcode
                    ORDER BY c2.transaction_transaction_id,c2.product_barcode,c1.pieces
                    LIMIT 50000) table1
                    order by occurances DESC
                    LIMIT 50";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["barcode1"]. "</td><td>" . $row["name1"] . "</td><td>". $row["barcode2"] . "</td><td>"
                    . $row["name2"] . "</td><td>". $row["occurances"] . "</td><td>". $row["sums"]. "</td></tr>";
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
        <p>SELECT DISTINCT table1.barcode1,table1.name1,table1.barcode2,table1.name2,COUNT(table1.pieces1 + table1.pieces2)</p>
        <p>OVER (PARTITION BY table1.barcode1,table1.barcode2) as occurances,</p>
        <p>SUM(table1.pieces1 + table1.pieces2) OVER (PARTITION BY table1.barcode1,table1.barcode2) as SUMS FROM</p>
        <p>(SELECT DISTINCT c2.transaction_transaction_id,c2.product_barcode as barcode1,p2.name </p>
        <p>as name1,c2.pieces as pieces1,c1.product_barcode as barcode2,p1.name as name2,c1.pieces as pieces2 </p>
        <p>FROM contains as c2</p>
        <p>INNER JOIN contains c1</p>
        <p>INNER JOIN product p2</p>
        <p>INNER JOIN product p1</p>
        <p>WHERE c1.transaction_transaction_id = c2.transaction_transaction_id AND c2.product_barcode != c1.product_barcode</p> 
        <p>AND p2.barcode = c2.product_barcode AND p1.barcode = c1.product_barcode AND c2.product_barcode > c1.product_barcode</p>
        <p>ORDER BY c2.transaction_transaction_id,c2.product_barcode,c1.pieces</p>
        <p>LIMIT 50000) table1</p>
        <p>ORDER BY occurances DESC</p>
        <p>LIMIT 50;</p>
    <br><br><br><br><br><br>

</body>
</html>