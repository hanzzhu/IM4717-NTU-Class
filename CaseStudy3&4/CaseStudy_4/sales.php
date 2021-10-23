
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


    $Java_Sales = $Java_Quantity*$Java_Price;
    $Lait_Single_Sales = $Lait_Single_Quantity*$Lait_Single_Price;
    $Lait_Double_Sales = $Lait_Double_Quantity*$Lait_Double_Price;
    $Cappu_Single_Sales = $Cappu_Single_Quantity*$Cappu_Single_Price;
    $Cappu_Double_Sales= $Cappu_Double_Quantity*$Cappu_Double_Price;

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
            <h1> Daily sales report</h1>
            <table  class="sales-table">
                <thead>
                <tr><td><h3>Coffee</h3></td>
                <td><h3>Quantity</h3></td>
                <td><h3>Price</h3></td>
                <td><h3>Total Sales</h3></td></tr></thead>


                <tr><td><h3>Just Java</h3></td>
                    <td><h3><?php echo $Java_Quantity; ?></h3></td>
                    <td><h3>$<?php echo $Java_Price; ?></h3></td>
                    <td class="sales_amount"> <h3>$<?php echo $Java_Sales; ?></h3></td></tr>

                <tr><td><h3>Cafe au Lait Single</h3></td>
                    <td><h3><?php echo $Lait_Single_Quantity; ?></h3></td>
                    <td><h3>$<?php echo $Lait_Single_Price; ?></h3></td>
                    <td class="sales_amount"><h3>$<?php echo $Lait_Single_Sales; ?></h3></td></tr>

                <tr><td><h3>Cafe au Lait Double</h3></td>
                    <td><h3><?php echo $Lait_Double_Quantity; ?></h3></td>
                    <td><h3>$<?php echo $Lait_Double_Price; ?></h3></td>
                    <td class="sales_amount"><h3>$<?php echo $Lait_Double_Sales; ?></h3></td></tr>

                 <tr><td><h3>Iced Cappuccino Single</h3></td>
                     <td><h3><?php echo $Cappu_Single_Quantity; ?></h3></td>
                     <td><h3>$<?php echo $Cappu_Single_Price; ?></h3></td>
                     <td class="sales_amount"><h3>$<?php echo $Cappu_Single_Sales; ?></h3></td></tr>

                <tr><td><h3>Iced Cappuccino Double</h3></td>
                    <td><h3><?php echo $Cappu_Double_Quantity; ?></h3></td>
                    <td><h3>$<?php echo $Cappu_Double_Price; ?></h3></td>
                    <td class="sales_amount"><h3>$<?php echo $Cappu_Double_Sales; ?></h3></td></tr>

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

