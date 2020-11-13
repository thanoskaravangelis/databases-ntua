<!DOCTYPE>
<html>
    <head>
        <title>
            Customer Phones
        </title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

<body>
    <div class="welcome">
        <h1><em> Customer Phones <em></h1>
        </div>
    <nav>
        <ul class="first_bar">
            <li><a href="#">Menu</a>
            <ul class="nav-links">
                    <br>
                    <li><a href="http://localhost/project2020/stores/stores.php">Stores</a></li>
                    <li class="active"><a href="http://localhost/project2020/customer/customer.php">Customers</a></li>
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
                <li><a href="http://localhost/project2020/views/updatable.php">Updatable View</a></li>
                <li><a href="http://localhost/project2020/views/unupdatable.php">Unupdatable View</a></li>
                </ul>
            </li>
            <li><a href="http://localhost/project2020/main/index.php">Home Page</a></li>
        </ul>    

    </nav>
    <br><br>

    <div class="txt">
        <h3>Customers Management</h3>
    </div>  

    <div class="menu">
        <li><a href="http://localhost/project2020/customer/customer.php">View</a></li>
        <li><a href="http://localhost/project2020/customer/process/upd_form.php">Update</a></li>
        <li><a href="http://localhost/project2020/customer/process/insert.php">Insert</a></li>
        <li><a href="http://localhost/project2020/customer/process/del_form.php">Delete</a></li>
        <li class="active"><a href="http://localhost/project2020/customer/phones/customer_phones.php">Phones</a></li>
    </div>

    <table>
        <tr>
            <th>Name</th>
            <th>Customer with Card ID</th>
            <th>Phone Number</th>
            <th>Insert</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "project2020");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if(isset($_GET['cid'])){
                ?><div class="back">
                <a href="http://localhost/project2020/customer/customer.php"><button type="button" class="back">Back</button></a>
                </div>
                <?php
                $x=$_GET['cid'];
                $sql = "SELECT customer.name, customer_phones.card_number_ID,
                customer_phones.phone_number FROM customer_phones, customer 
                WHERE customer.card_number_ID = customer_phones.card_number_ID AND customer.card_number_ID = ".$x." ORDER BY card_number_ID";
            }
            else{
                $sql = "SELECT customer.name, customer_phones.card_number_ID,
            customer_phones.phone_number FROM customer_phones, customer 
            WHERE customer.card_number_ID = customer_phones.card_number_ID ORDER BY card_number_ID";

            }
            ?><br><br><?php


            
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["name"]."</td><td>" . $row["card_number_ID"] . "</td><td>" . $row["phone_number"]. "</td><td>
                    <a href='http://localhost/project2020/customer/phones/insert.php?p=".$row['card_number_ID']."'>Insert</a></td><td>
                    <a href='http://localhost/project2020/customer/phones/delete.php?p=".$row['phone_number']."'>Delete</a></td><td>
                    <a href='http://localhost/project2020/customer/phones/update.php?p=".$row['phone_number']."'>Update</a></td></tr>";
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