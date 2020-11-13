<html>
    <head>
        <title>
            Clients
        </title>
        <link rel="stylesheet" href="style2.css" type="text/css">
    </head>

<body>
    <div class="welcome">
        <h1><em> Customers <em></h1>
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
			<a href="http://localhost/project2020/customer/process/upd_form.php"><button type="button" class="back">Back</button></a>
    </div>
    <br><br>
    <div class="title">
        <h2>Please fill the updated cells</h2> 
    </div>   

    

    
    <div class="insert-form">
        <form action="updit.php" method="get" name="user">
            <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
            <input type="hidden" name="str" value="<?php echo $_GET['str']?>">
            <input type="hidden" name="num" value="<?php echo $_GET['num']?>">
            <input type="hidden" name="pc" value="<?php echo $_GET['pc']?>">
            <input type="hidden" name="cit" value="<?php echo $_GET['city']?>">
            <input type="hidden" name="fam" value="<?php echo $_GET['fam']?>">
            <input type="hidden" name="poi" value="<?php echo $_GET['points']?>">
            <input type="hidden" name="pe" value="<?php echo $_GET['pet']?>">
            <input type="text" name="street" class="form-control" placeholder ="Street Name: Previous Value: <?php echo $_GET["str"]?>"><br>
            <input type="int" name="number" class="form-control" placeholder ="Street Number: Previous Street: <?php echo $_GET["num"]?>"><br>
            <input type="text" name="postal_code" class="form-control" placeholder ="Postal Code: Previous Number: <?php echo $_GET["pc"]?>"><br>
            <input type="text" name="city" class="form-control" placeholder ="City: Previous City: <?php echo $_GET["city"]?>"><br>
            <input type="int" name="points" class="form-control" placeholder ="Points: Previous Value: <?php echo $_GET["points"]?>"><br>
            <input type="text" name="family" class="form-control" placeholder ="Family Members: Previous Value: <?php echo $_GET["fam"]?>"><br>
            <input type="text" name="pet" class="form-control" placeholder="Pet: Previous: <?php echo $_GET["pet"]?>"><br>
            <input type="submit" class="form-control submit" value="Submit">
        </form>	
    </div>
</body>
</html>    
