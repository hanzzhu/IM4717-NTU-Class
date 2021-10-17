<!DOCTYPE html>
<html>
<body>

<?php

    $price_mappings = arrar('price_new_1','price_new_2','price_new_3','price_new_4','price_new_5',)
    $servername = "localhost";
    $username = "f32ee";
    $password = "f32ee";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo '<script>console.log("Connection established")</script>';

      $price_new1=$_POST['price_new_1'];
      $price_new2=$_POST['price_new_2'];
      $price_new3=$_POST['price_new_3'];
      $price_new4=$_POST['price_new_4'];
      $price_new5=$_POST['price_new_5'];

    if (!$price_new1 || !$price_new2 || !$price_new3 || !$price_new4 || !$price_new5) {
       echo "No change has been made.";
    }
    if (!get_magic_quotes_gpc()) {
        $price_new1 = doubleval($price_new1);
        $price_new2 = doubleval($price_new2);
        $price_new3 = doubleval($price_new3);
        $price_new4 = doubleval($price_new4);
        $price_new5 = doubleval($price_new5);
    }

    $sql = "UPDATE coffee SET price=10 WHERE id=2";
    foreach($_POST as $new_price_input){
    }
    $result = $db->query($query);

  
    $db->close();

?>   

</body>
</html>