<html>
    <head>
        <title>
            Queries
        </title>
        <link rel="stylesheet" href="style2.css" type="text/css">
    </head>

<body>
    <div class="welcome">
        <h1><em> Query 1 <em></h1>
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
                <li class="active"><a href="http://localhost/project2020/Queries/query1/input.php">Query 1</a></li>
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
                <li><a href="http://localhost/project2020/views/updatable.php">Unupdatable View</a></li>
                </ul>
            </li>
            <li><a href="http://localhost/project2020/main/index.php">Home Page</a></li>
        </ul>    

    </nav>
    <div class="back">
			<a href="http://localhost/project2020/Queries/query1/input.php"><button type="button" class="back">Back</button></a>
    </div> 
    <br><br>
    <table>
        <tr>
            <th>Transaction ID</th>
            <th>Date and Time</th>
            <th>Total Cost</th>
            <th>Total Pieces</th>
            <th>Payment Method</th>
            <th>Card Number ID</th>
            <th>Store ID</th>
        </tr>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "project2020");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $store_id=$_POST['store_id'];

            if($_POST["s_date"]==""){
                $s_date="2000-01-01";
            }
            else{
                $s_date=$_POST["s_date"];
            }

            if($_POST["e_date"]==""){
                $e_date="2030-01-01";
            }
            else{
                $e_date=$_POST["e_date"];
            }

            if($_POST["pieces"]==""){
                $pieces=0;
            }
            else{
                $pieces=$_POST["pieces"];
            }

            if($_POST["cost"]==""){
                $cost=0;
            }
            else{
                $cost=$_POST["cost"];
            }

            if ($_POST["paymethod"]==""){
                $sql="SELECT * FROM transaction WHERE stores_store_id='$store_id' AND total_pieces >= '$pieces' 
                AND total_amount>= '$cost' AND DATE(date_time) BETWEEN '$s_date' AND '$e_date' ";
            }
            else{
                if ($_POST["paymethod"]=="Cash"){
                    $sql="SELECT * FROM transaction WHERE stores_store_id='$store_id' AND total_pieces >= '$pieces' 
                    AND total_amount>= '$cost' AND payment_method='Μετρητά' AND DATE(date_time) BETWEEN '$s_date' AND '$e_date' "; 
                }
                else {
                    $sql="SELECT * FROM transaction WHERE stores_store_id='$store_id' AND total_pieces >= '$pieces' 
                    AND total_amount>= '$cost' AND payment_method='Πιστωτική Κάρτα' AND DATE(date_time) BETWEEN '$s_date' AND '$e_date'";
                }
            }

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $x=$row["transaction_id"];
                    echo "<tr><td><a href='http://localhost/project2020/transactions/contains.php?x=".$x."'>" . $row["transaction_id"]. "</a></td><td>" . $row["date_time"] . "&nbsp</td><td>"
                    . $row["total_amount"]. "</td><td>" . $row["total_pieces"] ."</td><td>" . $row["payment_method"] ."</td><td>". $row["card_number_id"] ."</td><td>".  $row["stores_store_id"] ."</td></tr>";
                }
            } 
            else { 
                echo "0 results found"; 
            }
            $conn->close();
        ?>
    </table>
    <br><br>

</body>
</html>