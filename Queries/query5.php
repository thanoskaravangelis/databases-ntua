<html>
    <head>
        <title>
            Queries
        </title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

<body>
    <div class="welcome">
        <h1><em> Query 5 <em></h1>
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
                <li class="active"><a href="http://localhost/project2020/Queries/query5.php">Query 5</a></li>
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
        <h3>Task : Find Percentage of Supermarket's Products Bought per Product Category</h3>
    </div>    


    <table>
        <tr>
            <th>Product Category ID</th>
            <th>Product Category Name</th>
            <th>Supermarket's Brand Products Bought per Total Products Bought </th>
        </tr>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "project2020");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = " select product_category_prod_cat_id ,t2.name ,sum(case when t2.brand_name='Yes' then sum_of_prods else 0 end) / sum(sum_of_prods) * 100 as pcnt from
                    (SELECT distinct p.product_category_prod_cat_id,pc.name,p.barcode,p.brand_name,sum(c.pieces) over(partition by p.barcode) as sum_of_prods
                    from product p
                    join product_category pc
                    join contains c 
                    where  c.product_barcode = p.barcode and pc.prod_cat_id = p.product_category_prod_cat_id
                    order by product_category_prod_cat_id ) t2 
                    group by product_category_prod_cat_id ";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["product_category_prod_cat_id"]. "</td><td>" . $row["name"] . "</td><td>"
                    . $row["pcnt"]."%". "</td></tr>";
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
        <p>SELECT product_category_prod_cat_id ,t2.name ,</p>
        <p>SUM(case when t2.brand_name='Yes' then sum_of_prods else 0 end) / SUM(sum_of_prods) * 100 as pcnt FROM</p>
        <p>(SELECT DISTINCT p.product_category_prod_cat_id,pc.name,p.barcode,p.brand_name,SUM(c.pieces)</p>
        <p>OVER(PARTITION BY p.barcode) as sum_of_prods</p>
        <p>FROM product p</p>
        <p>JOIN product_category pc</p>
        <p>JOIN contains c </p>
        <p>WHERE  c.product_barcode = p.barcode AND pc.prod_cat_id = p.product_category_prod_cat_id</p>
        <p>ORDER BY product_category_prod_cat_id ) t2 </p>
        <p>GROUP BY product_category_prod_cat_id</p>
    </div>
    <br><br><br><br><br><br>

</body>
</html>