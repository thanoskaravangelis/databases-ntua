<html>
    <head>
        <title>
            Products
        </title>
        <link rel="stylesheet" href="style.css" type="text/css">
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
        <a href="http://localhost/project2020/product/process/update.php"><button type="button" class="back">Back</button></a>
    </div>
    <br><br>
    <div class="title">
        <h2>Please fill the fields you would like to update</h2> 
    </div>   

    

    
    <div class="insert-form">
        <form action="updit.php" method="get" name="user">
            <input type="hidden" name="bar" value="<?php echo $_GET['bar']?>">
            <input type="hidden" name="pr" value="<?php echo $_GET['pr']?>">
            <input type="hidden" name="br" value="<?php echo $_GET['br']?>">
            <input type="hidden" name="pc" value="<?php echo $_GET['pc']?>">
            <input type="hidden" name="n" value="<?php echo $_GET['n']?>">
            <input type="text" name="barcode" class="form-control" placeholder ="Barcode: Previous Barcode: <?php echo $_GET["bar"]?>"><br>
            <input type="int" name="price" class="form-control" placeholder ="Price: Previous Price: <?php echo $_GET["pr"]?>"><br>
            <input type="text" name="brand_name" class="form-control" placeholder ="Brand Name(Yes/No)"><br>
            <input type="text" name="name" class="form-control" placeholder ="Name: Previous Name: <?php echo $_GET["n"]?>"><br>
            <input type="int" name="prod_cat" class="form-control" placeholder ="Product Category ID: Previous: <?php echo $_GET["pc"]?>"><br>
            <input type="submit" class="form-control submit" value="Submit">
        </form>	
    </div>
</body>
</html>    
