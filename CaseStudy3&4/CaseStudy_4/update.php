<!DOCTYPE html>
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
    $id_array = array("price_new_1" => array(1,"Just Java"),"price_new_2" => array(2,"Cafe au Lait Single"),"price_new_3" => array(3,"Cafe au Lait Double"),"price_new_4" => array(4,"Iced Cappuccino Single"),"price_new_5" => array(5,"Iced Cappuccino Double") );

    $new_price_array = array();
    $message = "";
    foreach($_POST as $id => $price_input){
        $price_id = $id_array[$id][0];
        $price_description = $id_array[$id][1];

        if($price_input){
            $query_update = "UPDATE coffee SET price=$price_input WHERE id=$price_id";
            if(mysqli_query($conn, $query_update)){
                $message .= "Price of item".$price_id.": ".$price_description." has been updated to: $". $price_input." \\n";
            }else{
                $message = "Error updating record: " . mysqli_error($conn);
            }
        }
    }
    if($message!= ""){
        echo "<script type='text/javascript'>alert('$message');</script>";
    }



    $result_array = array();
    $query_get = "SELECT price FROM coffee";
    $result  = mysqli_query($conn, $query_get);

    foreach ($result as $result_value) {
        array_push($result_array,floatval($result_value["price"]));
    }
    $price_1 = $result_array[0];
    $price_2 = $result_array[1];




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
                <li><a href="update.php">Update Menu</a></li>&nbsp;
                <li><a href="report.html">Daily Sales Report</a></li>&nbsp;
            </ul>
        </nav>
    </div>

    <div class="right_column">
        <div class="menu">
            <h1>Coffee at JavaJam</h1>
            <form id="my_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="">
            <div class="update_table">
                <table>

                    <tr>
                        <td>
                            <h3>Just Java</h3>
                        </td>
                        <td>
                            <p>
                                Regular house blend, decaffeinated coffee, or flavor of the day.<br>
                            </p>
                            <p class="radio-button">
                                <input type="checkbox" id="price_1" name="price_1" value="" onInput="onPriceChange(1)"/>
                                Endless Cup $<span id="Java"><?php echo $result_array[0]; ?></span>
                                <input type="hidden" id="price_new_1" name="price_new_1" value="" min = 0 step="0.01"/>
                            </p>
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <h3>Cafe au Lait</h3>
                        </td>
                        <td>
                            <p>
                                House blended coffee infused into a smooth, steamed milk.<br>
                            </p>

                            <p class="radio-button">
                                <input type="checkbox" id="price_2" name="price_2" value="" onInput="onPriceChange(2)"/>
                                Single $<span id="Java"><?php echo $result_array[1]; ?></span>
                                <input type="hidden" id="price_new_2" name="price_new_2" value="" min = 0 step="0.01"/>
                                &nbsp; &nbsp; &nbsp;
                                <input type="checkbox" id="price_3" name="price_3" value="" onInput="onPriceChange(3)"/>
                                Double $<span id="Java"><?php echo $result_array[2]; ?></span>
                                <input type="hidden" id="price_new_3" name="price_new_3" value="" min = 0 step="0.01"/>
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h3>Iced Cappuccino</h3>
                        </td>
                        <td>
                            <p>
                                Sweetened espresso blended with icy-cold milk and served in
                                a chilled glass.<br>
                            </p>
                            <p class="radio-button">
                                <input type="checkbox" id="price_4" name="price_4" value="" onInput="onPriceChange(4)"/>
                                Single $<span id="Java"><?php echo $result_array[3]; ?></span>
                                <input type="hidden" id="price_new_4" name="price_new_4" value="" min = 0 step="0.01"/>
                                &nbsp; &nbsp; &nbsp;
                                <input type="checkbox" id="price_5" name="price_5" value="" onInput="onPriceChange(5)"/>
                                Double $<span id="Java"><?php echo $result_array[4]; ?></span>
                                <input type="hidden" id="price_new_5" name="price_new_5" value="" min = 0 step="0.01"/>
                            </p>
                        </td>

                    </tr>
                    <tr>
                        <td>

                        </td>

                        <td>
                            <input type="submit" value="Update"/>
                        </td>
                    </tr>



                </table>
            </div>
            </form>
        </div>
    </div>

    <footer>
        <small>
            <i>Copyright &copy; 2014 JavaJam Coffeee House</i>
            <br>
            <i><a href="mailto:hanzhuo@zhu.com">hanzhuo@zhu.com</a></i>
        </small>
    </footer>
    <script type="text/javascript" src="js/update.js"></script>
</div>
</body>
</html>

