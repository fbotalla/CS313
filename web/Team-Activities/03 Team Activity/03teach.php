<?php
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $major = htmlspecialchars($_POST["major"]);
    $places = $_POST["place"];
    $comments = htmlspecialchars($_POST["comments"]);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Results</title>
    </head>
    <body>
        <?=$name?>
        <br>
        Email: <a href="mailto:<?=$email?>"><?=$email?></a>
        <br>
        <?=$major?>
        <br>
        <?=$comments?>
        <br>
        <?php
            foreach($_POST['place'] as $selected){
                echo $selected."</br>";
            }
        ?>
    </body>
</html>