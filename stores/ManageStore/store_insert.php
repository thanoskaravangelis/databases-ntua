<html>
    <head>
        <title>
            Store Insertion
        </title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

<body>
    <div class="welcome">
        <h1><em> Stores <em></h1>
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
                <li><a href="http://localhost/project2020/view/updatable.php">Updatable View</a></li>
                <li><a href="http://localhost/project2020/view/unupdatable.php">Unupdatable View</a></li>
                </ul>
            </li>
            <li><a href="http://localhost/project2020/main/index.php">Home Page</a></li>
        </ul>    

    </nav>
    <div class="back">
        <a href="http://localhost/project2020/stores/stores.php"><button type="button" class="back">Back</button></a>
    </div>
    <br><br>
    <div class="title">
        <h2>Insert the information of the store you would like to insert!</h2> 
    </div>    

    <div class="insert-form">
    <form action="insertit.php" method="post" name="user">
        <input type="text" name="operating_hours" class="form-control" placeholder ="Operating Hours: 09:00-21:00(Default Value)" readonly><br>
        <input type="float" name="square_meters" class="form-control" placeholder ="Square Meters" required><br>
        <input type="text" name="street" class="form-control" placeholder ="Street Name" required><br>
        <input type="int" name="number" class="form-control" placeholder ="Street Number" required><br>
        <input type="text" name="postal_code" class="form-control" placeholder ="Postal Code" required><br>
        <input type="text" name="city" class="form-control" placeholder ="City" required><br>
        <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" required><br>
	    <input type="text" name="phone_number2" class="form-control" placeholder="2nd Phone Number(optional)" ><br>
        <input type="submit" class="form-control submit" value="Submit">
    </form>	
    </div>
