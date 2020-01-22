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
            <br>
            <label>North America</label>
            <input type="checkbox" name="place[]" id="place-na" value="North America">
            <br>
            <label>South America</label>
            <input type="checkbox" name="place[]" id="place-sa" value="South America">
            <br>
            <label>Africa</label>
            <input type="checkbox" name="place[]" id="place-af" value="Africa">
            <br>
            <label>Europe</label>
            <input type="checkbox" name="place[]" id="place-eu" value="Europe">
            <br>
            <label>Asia</label>
            <input type="checkbox" name="place[]" id="place-as" value="Asia">
            <br>
            <label>Australia</label>
            <input type="checkbox" name="place[]" id="place-au" value="Australia">
            <br>
            <label>Antarctica</label>
            <input type="checkbox" name="place[]" id="place-an" value="Antarctica">
            <br>
            <input type="submit">
        </form>
        
    </body>
</html>