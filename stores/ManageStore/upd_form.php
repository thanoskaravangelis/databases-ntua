<html>
    <head>
        <title>
            Market Database
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
                    <li><a href='http://localhost/project2020/transactions/transactions.php'>Transaction</a></li>
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
        <a href="http://localhost/project2020/stores/ManageStore/store_update.php"><button type="button" class="back">Back</button></a>
    </div>
    <br><br><br>


    <div class="title">
        <h2>Please insert the updated informations of the store!</h2> 
    </div>    
    <?php
        $id=$_GET['id'];
        $sqr=$_GET['sqr'];
        $str=$_GET['str'];
        $num=$_GET['num'];
        $city=$_GET['city'];
        $post=$_GET['post'];
    ?>
    <div class="insert-form">
        <form action="updit.php" method="get" name="user">
            <input type="hidden" name="id" value= "<?php echo $id ?>"> 
            <input type="hidden" name="sqr" value= "<?php echo $sqr ?>">  
            <input type="hidden" name="str" value= "<?php echo $str ?>">  
            <input type="hidden" name="num" value= "<?php echo $num ?>">  
            <input type="hidden" name="cit" value= "<?php echo $city ?>">  
            <input type="hidden" name="post" value= "<?php echo $post ?>">   
            <input type="float" name="square_meters" class="form-control" placeholder ="Square Meters: Previous value <?php echo $sqr?>" ><br>
            <input type="text" name="street" class="form-control" placeholder ="Street Name: Previous value: <?php echo $str?>"><br>
            <input type="int" name="number" class="form-control" placeholder ="Street Number: Previous value: <?php echo $num?> " ><br>
            <input type="text" name="postal_code" class="form-control" placeholder ="Postal Code: Previous value: <?php echo $post?>"><br>
            <input type="text" name="city" class="form-control" placeholder ="City: Previous value: <?php echo $city?>" ><br>
            <input type="submit" class="form-control submit" value="Submit">
        </form>	
    </div>
