<?php

    $conn = mysqli_connect("localhost", "root", "", "project2020");
    if (isset($_GET["y"])){
        $result=mysqli_query($conn, "select distinct h.n as hours,c.card_number_ID,(sum(case when h.n=HOUR(t.date_time) then 1 else 0 end) over (partition by card_number_ID,hours) / sum(case when HOUR(t.date_time)=h.n then 1 else 0 end) over (partition by card_number_ID))*100 as pct from transaction t 
                    inner join customer c
                    inner join stores s
                    inner join (select 9 as n UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12 UNION ALL SELECT 13 UNION ALL SELECT 14 UNION ALL SELECT 15
                    UNION ALL SELECT 16 UNION ALL SELECT 17 UNION ALL SELECT 18 UNION ALL SELECT 19 UNION ALL SELECT 20) h
                    where s.store_id = t.stores_store_id and c.card_number_ID = t.card_number_id and t.card_number_id=".$_GET['x']." and s.store_id=".$_GET['y']."
                    order by card_number_ID , hours;");

    }
    else{
        $result=mysqli_query($conn, "select distinct h.n as hours,c.card_number_ID,(sum(case when h.n=HOUR(t.date_time) then 1 else 0 end) over (partition by card_number_ID,hours) / sum(case when HOUR(t.date_time)=h.n then 1 else 0 end) over (partition by card_number_ID))*100 as pct from transaction t 
                        inner join customer c
                        inner join stores s
                        inner join (select 9 as n UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12 UNION ALL SELECT 13 UNION ALL SELECT 14 UNION ALL SELECT 15
                        UNION ALL SELECT 16 UNION ALL SELECT 17 UNION ALL SELECT 18 UNION ALL SELECT 19 UNION ALL SELECT 20) h
                        where s.store_id = t.stores_store_id and c.card_number_ID = t.card_number_id and t.card_number_id=".$_GET['x']."
                        order by card_number_ID , hours;");
    }
?>

<html>
<head>
    <title>Bar Charts</title>
    <link rel="stylesheet" href="style2.css" type="text/css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Hour', 'Percentage'],

            <?php
                if(mysqli_num_rows($result)>0){
                    
                    while ($row= mysqli_fetch_array($result)){
                        echo "['" . $row['hours'].":00-".($row['hours']+1) .":00',".$row['pct']."],";
                    }
                }?>
                ]);

        var options = {
          chart: {
            title: 'Diagram Showing When A Customer Visits Our Stores More Often ',
            colors:['#5d4954'],
            background:['#5d4954'],
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
</head>
<body>
<div class="welcome">
        <h1><em> Query 2 Chart <em></h1>
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
    <div id="columnchart_material" style="width: 1200px; height: 500px; background-color=#5d4954"></div>

    <div class="above_views">
                        <h5>Our Query For the task:</h5>
                        <p>SELECT DISTINCT h.n AS hours,c.card_number_ID,(SUM(CASE WHEN h.n=HOUR(t.date_time) THEN 1 ELSE 0 END) </p>
                        <p>OVER (PARTITION BY card_number_ID,hours) / SUM(CASE WHEN HOUR(t.date_time)=h.n THEN 1 ELSE 0 END) </p>
                        <p>OVER (PARTITION BY card_number_ID))*100 AS pct FROM transaction t </p>
                        <p>INNER JOIN customer c</p>
                        <p>INNER JOIN stores s</p>
                        <p>INNER JOIN (SELECT 9 AS n UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12</p> 
                        <p>UNION ALL SELECT 13 UNION ALL SELECT 14 UNION ALL SELECT 15</p>
                        <p>UNION ALL SELECT 16 UNION ALL SELECT 17 UNION ALL SELECT 18 UNION ALL SELECT 19 UNION ALL SELECT 20) h</p>
                        <p>WHERE s.store_id = t.stores_store_id AND c.card_number_ID = t.card_number_id </p>
                        <p>AND t.card_number_id=".$_GET['x']." AND s.store_id=".$_GET['y']."</p>
                        <p>ORDER BY card_number_ID , hours;</p>
                        </div>
      <br><br><br><br>
</body>
</html>