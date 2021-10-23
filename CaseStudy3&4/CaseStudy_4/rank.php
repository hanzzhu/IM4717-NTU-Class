<html lang="en">

<head>
    <title>
        JavaJam Coffee House
    </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php

    $servername = "localhost";
    $username = "f32ee";
    $password = "f32ee";
    $dbname = "f32ee";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $quantityArray = array();
    $query_quantity = "SELECT quantity FROM orders";
    $result  = mysqli_query($conn, $query_quantity);

    foreach ($result as $result_value) {
        array_push($quantityArray,$result_value["quantity"]);
    }
    $Java_Quantity = $quantityArray[0];
    $Lait_Single_Quantity = $quantityArray[1] ;
    $Lait_Double_Quantity = $quantityArray[2] ;
    $Cappu_Single_Quantity = $quantityArray[3] ;
    $Cappu_Double_Quantity = $quantityArray[4] ;

    $price_array = array();
    $query_price = "SELECT price FROM coffee";
    $result  = mysqli_query($conn, $query_price);

    foreach ($result as $result_value) {
        array_push($price_array,floatval($result_value["price"]));
    }
    $Java_Price = $price_array[0];
    $Lait_Single_Price = $price_array[1];
    $Lait_Double_Price = $price_array[2];
    $Cappu_Single_Price = $price_array[3];
    $Cappu_Double_Price = $price_array[4];

    $Java_Sales = floatval($Java_Quantity*$Java_Price);
    $Lait_Single_Sales = floatval($Lait_Single_Quantity*$Lait_Single_Price);
    $Lait_Double_Sales = floatval($Lait_Double_Quantity*$Lait_Double_Price);
    $Cappu_Single_Sales = floatval($Cappu_Single_Quantity*$Cappu_Single_Price);
    $Cappu_Double_Sales= floatval($Cappu_Double_Quantity*$Cappu_Double_Price);

    $query_update = "UPDATE total_sales SET total=$Java_Sales WHERE coffee='Just Java';";
    $result = mysqli_query($conn, $query_update);
    $query_update = "UPDATE total_sales SET total=$Lait_Single_Sales WHERE coffee= 'Cafe au Lait Single';";
    $result = mysqli_query($conn, $query_update);
    $query_update = "UPDATE total_sales SET total=$Lait_Double_Sales WHERE coffee= 'Cafe au Lait Double';";
    $result = mysqli_query($conn, $query_update);
    $query_update = "UPDATE total_sales SET total=$Cappu_Single_Sales WHERE coffee= 'Iced Cappuccino Single';";
    $result = mysqli_query($conn, $query_update);
    $query_update = "UPDATE total_sales SET total=$Cappu_Double_Sales WHERE coffee= 'Iced Cappuccino Double';";
    $result = mysqli_query($conn, $query_update);


    $total_sales_array = array();
    $total_sales_coffee_array = array();
    $query_sort = "SELECT id,coffee,total FROM total_sales ORDER BY total DESC";
    $result  = mysqli_query($conn, $query_sort);
    foreach ($result as $key => $val) {
            array_push($total_sales_array,floatval($val["total"]));
            array_push($total_sales_coffee_array,$val["coffee"]);
    };
    mysqli_close($conn);

?>

<div id="wrapper">
    <header>
        <img src="img/header.png">
    </header>

    <div class="left_column">
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li> &nbsp;
                <li><a href="menu.html">Menu</a></li> &nbsp;
                <li><a href="music.html">Music</a></li> &nbsp;
                <li><a href="jobs.html">Jobs</a></li>&nbsp;
                <li><a href="update.html">Update Menu</a></li>&nbsp;
                <li><a href="report.html">Daily Sales Report</a></li>&nbsp;
            </ul>
        </nav>
    </div>

    <div class="right_column">
        <div class="report-menu">
            <h1> Sales Ranking </h1>
            <table  class="sales-table">
                <thead>
                <tr><td><h3>Coffee</h3></td>
                <td><h3>Total Sales</h3></td></tr></thead>


                <tr><td><h3><?php echo $total_sales_coffee_array[0]; ?></h3></td>
                    <td class="sales_amount"> <h3>$<?php echo $total_sales_array[0]; ?></h3></td></tr>

                <tr><td><h3><?php echo $total_sales_coffee_array[1]; ?></h3></td>
                    <td class="sales_amount"><h3>$<?php echo $total_sales_array[1]; ?></h3></td></tr>

                <tr><td><h3><?php echo $total_sales_coffee_array[2]; ?></h3></td>

                    <td class="sales_amount"><h3>$<?php echo $total_sales_array[2]; ?></h3></td></tr>

                 <tr><td><h3><?php echo $total_sales_coffee_array[3]; ?></h3></td>

                     <td class="sales_amount"><h3>$<?php echo $total_sales_array[3]; ?></h3></td></tr>

                <tr><td><h3><?php echo $total_sales_coffee_array[4]; ?></h3></td>

                    <td class="sales_amount"><h3>$<?php echo $total_sales_array[4]; ?></h3></td></tr>

            </table>

        </div>
    </div>

    <footer>
        <small>
            <i>Copyright &copy; 2014 JavaJam Coffeee House</i>
            <br>
            <i><a href="mailto:hanzhuo@zhu.com">hanzhuo@zhu.com</a></i>
        </small>
    </footer>
</div>
</body>
</html>

