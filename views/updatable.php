<html>
    <head>
        <title>
            Customer's Info
        </title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

<body>
    <div class="welcome">
        <h1><em> Updatable View <em></h1>
        </div>
    <nav>
        <ul class="first_bar">
            <li><a href="#">Menu</a>
            <ul class="nav-links">
                    <br>
                    <li><a href="http://localhost/project2020/stores/stores.php">Stores</a></li>
                    <li><a href="http://localhost/project2020/customer/php">Customers</a></li>
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
                <li class="active"><a href="http://localhost/project2020/views/updatable.php">Updatable View</a></li>
                <li><a href="http://localhost/project2020/views/unupdatable.php">Unupdatable View</a></li>
                </ul>
            </li>
            <li><a href="http://localhost/project2020/main/index.php">Home Page</a></li>
        </ul>    

    </nav>  
    <br><br><br><br><br>   
    <table>
        <tr>
            <th>Card Number ID</th>
            <th>Full Name</th>
            <th>Birth Date</th>
            <th>City</th>
            <th>Points</th>
            <th>Pet</th>
        </tr>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "project2020");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $results =mysqli_query($conn, "CREATE VIEW `customer_view`(card_number_ID, name, date_of_birth, city, points, pet) AS
                    SELECT card_number_ID, name, date_of_birth, city, points, pet FROM customer WHERE card_number_ID >=0");
            
            $result=mysqli_query($conn, "SELECT * FROM customer_view");    

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["card_number_ID"]. "</td><td>" . $row["name"] . "</td><td>"
                    . $row["date_of_birth"]. "</td><td>". $row["city"] ."</td><td>". $row["points"] ."</td><td>"
                    . $row["pet"] ."</td></tr>";
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
        <h5>Our Query For the View:</h5>
        <p>CREATE VIEW `customer_view`(card_number_ID, name, date_of_birth, city, points, pet) AS</p>
        <p>SELECT card_number_ID, name, date_of_birth, city, points, pet</p>
        <p>FROM customer WHERE card_number_ID >=0</p>
    </div>  
</body>
</html>