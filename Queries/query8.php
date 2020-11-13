<html>
    <head>
        <title>
            Our Queries
        </title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

<body>
    <div class="welcome">
        <h1><em> Our 1st Query <em></h1>
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
                <li ><a href="http://localhost/project2020/Queries/query7.php">Query 7</a></li>
                <li><a href="#">Our Queries</a>
                    <div class="subq">
                        <ul>
                            <li class="active"><a href="http://localhost/project2020/Queries/query8.php">Our Query 1</a></li>
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
        <h3>Task : Find the most popular product per category and its position in the store</h3>
    </div>    


    <table>
        <tr>
            <th>Product Name</th>
            <th>Product Category</th>
            <th>Total Product Pieces Bought </th>
            <th>Store ID</th>
            <th>Aisle</th>
            <th>Shelf</th>
            <th>Product Barcode</th>
        </tr>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "project2020");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = " SELECT t.name1,t.name2 ,max(sums),off.store_id,off.aisle,off.shelf,t.barcode from
                    (SELECT distinct p.barcode,p.name as name1,sum(pieces) over (partition by barcode) as sums ,pc.prod_cat_id,pc.name as name2 from product p
                    inner join contains c
                    inner join product_category pc
                    where c.product_barcode = p.barcode and pc.prod_cat_id = p.product_category_prod_cat_id 
                    order by prod_cat_id,sums DESC
                    LIMIT 1000) t
                    join offers off
                    where off.barcode = t.barcode
                    group by store_id,prod_cat_id
                    order by prod_cat_id,store_id ";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["name1"]. "</td><td>" . $row["name2"] . "</td><td>"
                    . $row["max(sums)"]."</td><td>".$row["store_id"] . "</td><td>".$row["aisle"] . "</td><td>" .$row["shelf"] . "</td><td>".$row["barcode"]
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
        <p>SELECT t.name1,t.name2 ,max(sums),off.store_id,off.aisle,off.shelf,t.barcode </p>
        <p>FROM (SELECT DISTINCT p.barcode,p.name as name1,SUM(pieces) OVER (PARTITION BY barcode) as sums ,</p>
        <p>pc.prod_cat_id,pc.name as name2 FROM product p</p>
        <p>INNER JOIN contains c</p>
        <p>INNER JOIN product_category pc</p>
        <p>WHERE c.product_barcode = p.barcode AND pc.prod_cat_id = p.product_category_prod_cat_id </p>
        <p>ORDER BY prod_cat_id,sums DESC</p>
        <p>LIMIT 1000) t</p>
        <p>JOIN offers off</p>
        <p>WHERE off.barcode = t.barcode</p>
        <p>GROUP BY store_id,prod_cat_id</p>
        <p>ORDER BY prod_cat_id,store_id</p>
    </div>
    <br><br><br><br><br><br>

</body>
</html>