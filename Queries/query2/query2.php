<html>
    <head>
        <title>
            Queries
        </title>
        <link rel="stylesheet" href="style2.css" type="text/css">
    </head>

<body>
    <div class="welcome">
        <h1><em> Query 2 <em></h1>
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
    <?php
        if (isset($_GET["note"])){
             ?> <div class="msg"><h2>Invalid option! Please fill the form again</h2></div>
             <?php
        }
        else{
        }
        ?>
        

    <form action="popprod.php" method="post">
            <select class="sel_bar" name="cust_id">
                <option value="0">Select A customer ID</option>
                <option value="1">1: Ιωάννης Παπαδόπουλος</option>
                <option value="2">2: Μαρία Ευθυμίου</option>
                <option value="3">3: Γεώργιος Πάνου</option>
                <option value="4">4: Ανδρέας Μαντζούτας</option>
                <option value="5">5: Ιωάννα Κώστα</option>
                <option value="6">6: Κώστας Ελευθερίου</option>
                <option value="7">7: James Brown</option>
                <option value="8">8: Ελένη Αλεξίου</option>
                <option value="9">9: Ιωάννης Κωνσταντίνου</option>
                <option value="10">10: Μιχάλης Μιχόπουλος</option>
            </select>
            <br><br>
            <select class="sel_bar" name="action">
                <option value="0">Select The Information you want</option>
                <option value="11">10 products customer has bought most times</option>
                <option value="12">Number of stores customer goes to</option>
                <option value="13">Which stores does he go to</option>
                <optgroup label="Diagram of the hours when he goes to a store">
                    <option value="100">Select a store ID</option>
                    <option value="1">1: Ελλησπόντου 4(Θεσσαλονίκη)</option>
                    <option value="2">2: Αβάντων 12(Χαλκίδα)</option>
                    <option value="3">3: Λικαρίου 2(Χαλκίδα)</option>
                    <option value="4">4: Βουλιαγμένης 123(Αθήνα)</option>
                    <option value="5">5: Φιλολάου 98(Αθήνα)</option>
                    <option value="6">6: Κατεχάκη 765(Αθήνα)</option>
                    <option value="7">7: Αχαρνών 2(Αθήνα)</option>
                    <option value="8">8: Νεάπολης 99(Θεσσαλονίκη)</option>
                    <option value="9">9: Αδ.Κοραή 56(Θεσσαλονίκη)</option>
                    <option value="10">10: Αθηνών 999(Αθήνα)</option>
                </optgroup>    
                <optgroup label="Average cost of customer's transactions last week and month">
                    <option value="14">Last Week</option>
                    <option value="15">Last Month</option>
                </optgroup>    
            </select>
            <br><br>
            <input type="Submit" class="sel_bar" value="submit">
    </form>      

</body>
</html>  