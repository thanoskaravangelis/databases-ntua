<html>
    <head>
        <title>
            Queries
        </title>
        <link rel="stylesheet" href="style2.css" type="text/css">
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
                <li class="active"><a href="http://localhost/project2020/Queries/query2/query2.php">Query 2</a></li>
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
   
    <div class="back">
            <a href="http://localhost/project2020/Queries/query2/query2.php"><button type="button" class="back">Back</button></a>
	</div>    
   

        <?php
            $conn = mysqli_connect("localhost", "root", "", "project2020");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $action=$_POST["action"];

            if ($action==0){
                header('Location: query2.php?note=fail');
                die();
            }
            if ($_POST["cust_id"]==0){
                header('Location: query2.php?note=fail');
                die();
            }


            elseif ($action==11){
                ?><div class="tab_info">
                    <h3>Task : Find the 10 most popular products for the customer</h3>
                </div> 
                <table>
                <tr>
                    <th>Product Name</th>
                    <th>Procuct Barcode</th>
                    <th>Products Bought</th>
                </tr>
                <?php
                $sql = " SELECT product.name, contains.product_barcode, SUM(contains.pieces) AS nr_of_product_bought 
                        FROM contains, product, transaction
                        WHERE product.barcode=contains.product_barcode
                        AND transaction.transaction_id=contains.transaction_transaction_id AND transaction.card_number_ID=".$_POST['cust_id']."
                        GROUP BY product_barcode
                        ORDER BY nr_of_product_bought DESC
                        LIMIT 10;";

                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["name"]. "</td><td>" . $row["product_barcode"] . "</td><td>"
                            . $row["nr_of_product_bought"]."</td></tr>";
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
                    <p>SELECT product.name, contains.product_barcode, SUM(contains.pieces) AS nr_of_product_bought </p>
                    <p>FROM contains, product, transaction</p>
                    <p>WHERE product.barcode=contains.product_barcode</p>
                    <p>AND transaction.transaction_id=contains.transaction_transaction_id AND transaction.card_number_ID='$_POST['cust_id']</p>
                    <p>GROUP BY product_barcode</p>
                    <p>ORDER BY nr_of_product_bought DESC</p>
                    <p>LIMIT 10;</p>
                    </div>
                </table>


                
                <?php
            }
            elseif ($action==12){


            ?><div class="tab_info">
                 <h3>Task : Find how many stores the customer goes to</h3>
                </div> 
                    <table>
                    <tr>
                        <th>Customer Name</th>
                        <th>Customer ID</th>
                        <th>Number of Stores</th>
                    </tr>
                    <?php
                    $sql1 = " SELECT customer.name, transaction.card_number_id, COUNT(DISTINCT stores_Store_id) AS nr_of_stores FROM transaction,customer 
                            WHERE transaction.card_number_id=".$_POST['cust_id']." AND customer.card_number_ID=transaction.card_number_ID 
                            GROUP BY card_number_id ";
        

                            $result = $conn->query($sql1);
                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["name"]. "</td><td>" . $row["card_number_id"] . "</td><td>"
                                . $row["nr_of_stores"]."</td></tr>";
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
                        <p>SELECT customer.name, transaction.card_number_id, COUNT(DISTINCT stores_Store_id) AS nr_of_stores</p> 
                        <p>FROM transaction,customer</p> 
                        <p>WHERE transaction.card_number_id=".$_POST['cust_id']." 
                        <p>AND customer.card_number_ID=transaction.card_number_ID</p> 
                        <p>GROUP BY card_number_id</p>
                        
                        </div>
                    </table>
                <?php }

        elseif ($action==13){


            ?><div class="tab_info">
                <h3>Task : Find which stores does he goes to</h3>
                </div> 
                    <table>
                    <tr>
                        <th>Customer Name</th>
                        <th>Store ID</th>
                        <th>Street</th>
                        <th>Number</th>
                        <th>City</th>
                    </tr>
                    <?php
                    $sql1 = "SELECT DISTINCT  customer.name , stores_store_id, stores.street, stores.number, stores.street, stores.city FROM transaction,customer, stores
                            WHERE transaction.card_number_ID = ".$_POST['cust_id']." AND customer.card_number_ID=transaction.card_number_id  AND stores.store_id=transaction.stores_store_id
                            ORDER BY stores_store_id ASC;";


                            $result = $conn->query($sql1);
                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["name"]. "</td><td>" . $row["stores_store_id"] . "</td><td>"
                                . $row["street"]."</td><td>".$row["number"]."</td><td>".$row["city"]."</td></tr>";
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
                        <p>SELECT DISTINCT  customer.name , stores_store_id, stores.street, stores.number, stores.street</p> 
                        <p>FROM transaction,customer, stores</p>
                        <p>WHERE transaction.card_number_ID = ".$_POST['cust_id']."</p> 
                        <p>AND customer.card_number_ID=transaction.card_number_id</p>  
                        <p>AND stores.store_id=transaction.stores_store_id</p>
                        <p>ORDER BY stores_store_id ASC;</p>
                        
                        </div>
                    </table>
                <?php }

        elseif ($action==14){


            ?><div class="tab_info">
                <h3>Task : Find average money customer spent the last week</h3>
                </div> 
                    <table>
                    <tr>
                        <th>Customer Name</th>
                        <th>Customer ID</th>
                        <th>Average Money Spent</th>
                    </tr>
                    <?php
                    $sql1 = "SELECT customer.name, transaction.card_number_id, ROUND(AVG(total_amount),2) 
                    FROM transaction, customer
                    WHERE DATE(date_time) BETWEEN '2020-06-02' AND '2020-06-09' 
                    AND customer.card_number_ID=transaction.card_number_ID
                    AND transaction.card_number_id=".$_POST['cust_id'].";";


                            $result = $conn->query($sql1);
                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["name"]. "</td><td>" . $row["card_number_id"] . "</td><td>"
                                . $row["ROUND(AVG(total_amount),2)"]."</td></tr>";
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
                        <p>SELECT customer.name, transaction.card_number_id, AVG(total_amount)</p>
                        <p>FROM transaction, customer</p>
                        <p>WHERE DATE(date_time) BETWEEN '2020-06-02' AND '2020-06-09'</p> 
                        <p>AND customer.card_number_ID=transaction.card_number_ID</p>
                        <p>AND transaction.card_number_id=".$_POST['cust_id'].";</p>
                        </div>
                    </table>
                <?php }


        elseif ($action==15){


            ?><div class="tab_info">
                <h3>Task : Find average money customer spent the last month</h3>
                </div> 
                    <table>
                    <tr>
                        <th>Customer Name</th>
                        <th>Customer ID</th>
                        <th>Average Money Spent</th>
                    </tr>
                    <?php
                    $sql1 = "SELECT customer.name, transaction.card_number_id, ROUND(AVG(total_amount),2) 
                    FROM transaction, customer
                    WHERE DATE(date_time) BETWEEN '2020-05-01' AND '2020-06-01' 
                    AND customer.card_number_ID=transaction.card_number_ID
                    AND transaction.card_number_id=".$_POST['cust_id'].";";


                            $result = $conn->query($sql1);
                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["name"]. "</td><td>" . $row["card_number_id"] . "</td><td>"
                                . $row["ROUND(AVG(total_amount),2)"]."</td></tr>";
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
                        <p>SELECT customer.name, transaction.card_number_id, AVG(total_amount</p>) 
                        <p>FROM transaction, customer</p>
                        <p>WHERE DATE(date_time) BETWEEN '2020-05-01' AND '2020-06-01'</p> 
                        <p>AND customer.card_number_ID=transaction.card_number_ID</p>
                        <p>AND transaction.card_number_id=".$_POST['cust_id'].";</p>
                        </div>
                    </table>
                <?php } 
        else{
            if ($action==100){
                header("Location: bar.php?x=".$_POST["cust_id"]."");
            }
            else{
                header("Location: bar.php?y=".$action."&x=".$_POST['cust_id']."");
                die();
            }
        }   
        ?>     

    <br><br><br><br><br><br>

</body>
</html>