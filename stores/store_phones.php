<html>
    <head>
        <title>
            Store Phones
        </title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

<body>
    <div class="welcome">
        <h1><em> Store Phones <em></h1>
        </div>
    <nav>
        <ul class="first_bar">
            <li><a href="#">Menu</a>
                <ul class="nav-links">
                    <br>
                    <li class="active"><a href="http://localhost/project2020/stores/stores.php">Stores</a></li>
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
                            <li><a href="http://localhost/project2020/Queries/query7.php">Our Query 1</a></li>
                            <li><a href="http://localhost/project2020/Queries/query7.php">Our Query 2</a></li>
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
    <br><br>
    <div class="txt">
        <h3>Store Management</h3>
    </div> 
    <div class="menu">
        <li><a href="http://localhost/project2020/stores/stores.php">View</a></li>
        <li><a href="http://localhost/project2020/stores/ManageStore/store_update.php">Update</a></li>
        <li><a href="http://localhost/project2020/stores/ManageStore/store_insert.php">Insert</a></li>
        <li><a href="http://localhost/project2020/stores/ManageStore/store_del.php">Delete</a></li>
        <li class="active"><a href="http://localhost/project2020/stores/store_phones.php">Store Phones</a></li>
    </div>
    
    <table>
        <tr>
            <th>Phone Number</th>
            <th>Store ID</th>
            <th>Insert</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "project2020");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if (isset($_GET['id'])){
                $sql = "SELECT * FROM store_phones WHERE store_id='$_GET[id]'";
            }
            else{
                $sql = "SELECT * FROM store_phones ORDER BY store_id";
            }
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["phone_number"]. "</td><td>" . $row["store_id"] . "</td><td>
                    <a href='http://localhost/project2020/stores/ManagePhones/insert.php?id=".$row["store_id"]."'>Insert</a></td><td>
                    <a href='http://localhost/project2020/stores/ManagePhones/update.php?p=".$row["phone_number"]."'>Update</a></td><td>
                    <a href='http://localhost/project2020/stores/ManagePhones/delphone.php?p=".$row["phone_number"]."'>Delete</a></td></tr>";
                }
            echo "</table>";
            } 
            else { 
                echo "0 results found"; 
            }
            $conn->close();
        ?>
    </table>
</body>
</html>