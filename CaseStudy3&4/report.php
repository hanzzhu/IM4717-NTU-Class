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
    $Java_Price = $result_array[0];
    $Lait_Single_Price = $result_array[1];
    $Lait_Double_Price = $result_array[2];
    $Cappu_Single_Price = $result_array[3];
    $Cappu_Double_Price = $result_array[4];


    $Java_Sales = $Java_Quantity*$Java_Price;
    $Lait_Single_Sales = $Lait_Single_Quantity*$Lait_Single_Price;
    $Lait_Double_Sales = $Lait_Double_Quantity*$Lait_Double_Price;
    $Cappu_Single_Sales = $Cappu_Single_Quantity*$Cappu_Single_Price;
    $Cappu_Double_Sales= $Cappu_Double_Quantity*$Cappu_Double_Price;

    mysqli_close($conn);

?>