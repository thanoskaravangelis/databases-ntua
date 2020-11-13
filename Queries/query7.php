<html>
    <head>
        <title>
            Queries
        </title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

<body>
    <div class="welcome">
        <h1><em> Query 7 <em></h1>
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
                <li class="active"><a href="http://localhost/project2020/Queries/query7.php">Query 7</a></li>
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
        <h3>Task : Find the percentage of each age group visiting our shop every hour</h3>
    </div>    
    <table>
        <tr>
            <th>Ages Less than 24</th>
            <th>Ages Between 24 and 65</th>
            <th>Ages More than 65</th>
            <th>Time</th>
        </tr>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "project2020");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "select distinct sum(case when age<24 then 1 else 0 end) over (PARTITION BY hours) / sum(1) over (PARTITION BY hours) * 100 as lessthan,
                    sum(case when age>=24 and age<65 then 1 else 0 end) over (PARTITION BY hours) / sum(1) over (PARTITION BY hours) * 100 as between24 ,
                    sum(case when age>65 then 1 else 0 end) over (PARTITION BY hours) / sum(1) over (PARTITION BY hours) * 100 as greaterthan ,hours from 
                    (select TIMESTAMPDIFF(YEAR , c.date_of_birth, CURDATE()) as age ,HOUR(date_time) as hours from transaction t
                    join customer c
                    where c.card_number_ID = t.card_number_id ) t
                    order by hours";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["lessthan"]. "</td><td>" . $row["between24"] . "</td><td>". $row["greaterthan"] . "</td><td>"
                    . $row["hours"].":00"."-".($row["hours"]+1) .":00". "</td></tr>";
                }
            echo "</table>";
            } 
            else { 
                echo "0 results found"; 
            }
            $conn->close();
        ?>
        <div class="above_views">
        <h5>Our Query For the task:</h5>
        <p>SELECT DISTINCT SUM(CASE WHEN age<24 THEN 1 ELSE 0 END) </p>
        <p>OVER (PARTITION BY hours) / SUM(1) OVER (PARTITION BY hours) * 100 </p>
        <p>as lessthan,</p>
        <p>SUM(CASE WHEN age>=24 AND age<65 THEN 1 ELSE 0 END) </p>
        <p>OVER (PARTITION BY hours) / SUM(1) OVER (PARTITION BY hours) * 100 </p>
        <p>as between24 ,</p>
        <p>SUM(CASE WHEN age>65 THEN 1 ELSE 0 END) OVER (PARTITION BY hours) / SUM(1)</p>
        <p>OVER (PARTITION BY hours) * 100 </p>
        <p>as greaterthan ,hours FROM </p>
        <p>(SELECT TIMESTAMPDIFF(YEAR , c.date_of_birth, CURDATE()) as age ,HOUR(date_time) </p>
        <p>as hours FROM transaction t</p>
        <p>JOIN customer c</p>
        <p>WHERE c.card_number_ID = t.card_number_id ) t</p>
        <p>ORDER BY hours</p>
    </div>
    </table>

    
    <br><br><br><br><br><br>

</body>
</html>