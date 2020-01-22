<html>

<head>
    <link rel="stylesheet" href="cart.css">

</head>

<body onload="calcTotal()">

<h2>Your Cart</h2>

<?php
session_start();
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

 $sum = array_sum($item);

$remaining = 0;


$_SESSION["items"] = $item;

$photo = array("shorts", "coat","glasses","gloves","hat","longsleeve","scarf","shirt","shoes","ball","socks","tuta");
?>


<?php
    if(empty($item)):
?>
         <span>Your cart is empty</span>
<?php
    else:
?>
        <table id="cart_table">
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th></th>
            </tr>
            <?php
                for($i = 0;$i< count($item);$i++):
                    if(!empty($item[$i])):
                        $numRow++; 
            ?>
                        <tr>
                            <td><img src ='images/<?php echo $photo[$i] ?>.jpg'/></td>
                            <td>$<?php echo $item[$i]; ?></td> 
                            <td><button id= "btn" onclick =  "this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); this.parentNode.paretnNode.parentNode.sum(<?php $remaining . '+=td.parentNode.value]' ?>);"> Remove</button></tr>
                        
                        </tr>
            <?php
                    endif;
                endfor;
            ?>   
        </table>
<?php
    endif;
?>
 <script>
    function deleteFromCart(rowToDelete){
        document.getElementById("cart_table").deleteRow(rowToDelete);
    }
 </script>

<p id="total"> </p>

<div class = grid>
     
    <div class = grid_item>
        <button><a href="main.php">Back</a></button>
    </div>


    <div class = grid_item>
        <p >
        <?php
            session_start();
            $total = $sum - $remaining;
            echo "Your total is $" . number_format((float)$total,2,'.','');
            $_SESSION["total"] = $total - $remaining;
            $_SESSION["remaining"] = $remaining
        ?>
        </p>
    </div>

    <div class = grid_item>
        <button><a href="checkout.php">Checkout</a></button>
    </div>

</div>



</body>
</html>