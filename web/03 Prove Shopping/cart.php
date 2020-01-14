<html>

<head>
    <link rel="stylesheet" href="cart.css">
    <script src= "cart.js"></script>

</head>

<body>

<h2>Your Cart</h2>

<?php
 $item = array();

 $item[0] = $_POST["shorts"];
 $item[1] = $_POST["coat"];
 $item[2] = $_POST["glasses"];
 $item[3] = $_POST["gloves"];
 $item[4] = $_POST["hat"];
 $item[5] = $_POST["longsleeve"];
 $item[6] = $_POST["scarf"];
 $item[7] = $_POST["shirt"];
 $item[8] = $_POST["shoes"];
 $item[9] = $_POST["ball"];
 $item[10] = $_POST["socks"];
 $item[11] = $_POST["tuta"];


$photo = array("shorts", "coat","glasses","gloves","hat","longsleeve","scarf","shirt","shoes","ball","socks","tuta");
?>

<?php
if(empty($item)){
    echo "Your cart is empty";
 }
 else{
    echo '<table id="cart_table"><tr><th>Item</th><th>Price</th><th></th></tr>' ;
         for($i = 0;$i< count($item);$i++){
             if(!empty($item[$i])){     
                 echo '<tr><td>' . "<img src = 'images/$photo[$i].jpg'>" .'</td>';
                 echo '<td>' .'$' . $item[$i] . '</td>'; 
                 echo '<td>' . '<button id= "btn"   onclick =  "deleteRow(this)"> Remove</button>'.'</tr>' ;       
             }         
         }
         echo '</table>';
         }
         
 ?>


<div class = grid>
     
    <div class = grid_item>
        <button><a href="main.php">Back</a></button>
    </div>


    <div class = grid_item>
        <p >
        <?php
            $sum = array_sum($item);
            echo "Your total is $" . number_format((float)$sum,2,'.','')
        ?>
        </p>
    </div>

    <div class = grid_item>
        <button><a href="main.php">Back</a></button>
    </div>

</div>



</body>
</html>