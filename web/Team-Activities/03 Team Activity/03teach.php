<?php
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $major = htmlspecialchars($_POST["major"]);
    $places = $_POST["place"];
    $comments = htmlspecialchars($_POST["comments"]);

    $continents_map = [
        "na" => "North America",
        "sa" => "South America",
        "eu" => "Europe",
        "as" => "Asia",
        "au" => "Australia",
        "af" => "Africa",
        "an" => "Antartica",
        "at" => "Atlantis"
    ];
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
            foreach ($_POST['place'] as $continent) {
                echo "<p>You have visited " . $continents_map[$continent] . "\n</p>";
            }
        ?>
    </body>
</html>