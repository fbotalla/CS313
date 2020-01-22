<!DOCTYPE>
<html>
    <head>
        <title>
​
        </title>
    </head>
    <body>

    <?php

    $majors = array("Computer Science" =>"CS", "Web Design and Development" => "WDD", "Computer information Technology" => "CIT", "Computer Engineering" => "CE")
    ?>

    
        <form action="03teach.php" method="post">
            <label>Name</label>
            <input id="name" name="name">
            <br>
            <label>Email</label>
            <input id="email" name="email">
            <br>
            <label>Major:</label>
            <br>

            <?php
                foreach($majors as $x => $x_value):
                ?>
            
                <input type="radio" name = "major" value = "<?php $x?>" id = "<?php $x_value ?>"><?php echo $x ?> <br>
            <?php endforeach; ?>

            <label>Comments</label>
            <textarea id="comments" name="comments" rows="3" cols="40"></textarea>
            <br> <br>
            <label>Continents Visited:</label>
            <ul>
                <li><input name="place[]" type="checkbox" value="na"/>North America</li>
                <li><input name="place[]" type="checkbox" value="sa"/>South America</li>
                <li><input name="place[]" type="checkbox" value="eu"/>Europe</li>
                <li><input name="place[]" type="checkbox" value="as"/>Asia</li>
                <li><input name="place[]" type="checkbox" value="au"/>Australia</li>
                <li><input name="place[]" type="checkbox" value="af"/>Africa</li>
                <li><input name="place[]" type="checkbox" value="an"/>Antartica</li>
                <li><input name="place[]" type="checkbox" value="at"/>Atlantis</li>
            </ul>
            <input type="submit">
        </form>
        
    </body>
</html>