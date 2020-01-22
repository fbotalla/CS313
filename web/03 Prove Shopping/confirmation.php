<!DOCTYPE html>
<html>
    <?php
session_start();
?>
    <head>
    <title>Confimation Page</title>

    <link rel="stylesheet" href="cart.css">
    </head>

    <body>



    <?php
       $photo = array("shorts", "coat","glasses","gloves","hat","longsleeve","scarf","shirt","shoes","ball","socks","tuta");
    ?>

    <h3>Delivering these items to <?php echo $_SESSION["street"] . ", " . $_SESSION["city"] . ", " . $_SESSION["state"] . " " . $_SESSION["zip"];?></h3>

<table id="cart_table">
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th></th>
            </tr>
            <?php
               foreach($_SESSION["items"] as $key => $value):
                    if(!empty($_SESSION["items"][$key])):
            ?>
                        <tr>
                            <td><img src ='images/<?php echo $photo[$key] ?>.jpg'/></td>
                            <td>$<?php echo $_SESSION["items"][$key]; ?></td> 
                        </tr>
            <?php
                    endif;
                endforeach;
            ?>   
            <tr><td>Total<td><td<p><?php echo "$" . number_format((float)array_sum($_SESSION["items"]),2,'.','')?></p></td></tr>
        </table>



    </body>



</html>