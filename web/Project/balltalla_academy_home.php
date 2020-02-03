<!DOCTYPE html>
<html lang="en">
    <head>
        <title>batalla academy</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel= "stylesheet" href="CSS/balltalla_academy_home.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Sigmar+One&display=swap" rel="stylesheet">
        <script> 
            $(function(){
                $("#header").load("header.html"); 
                
            });
        </script> 

    </head>

    <body>

    <?php
            // default Heroku Postgres configuration URL
            $dbUrl = getenv('DATABASE_URL');

            if (empty($dbUrl)) {
            // example localhost configuration URL with postgres username and a database called cs313db
                 $dbUrl = "postgres://postgres:Fabem2018!@localhost:5432/postgres";
            }

           // print "<p>$dbUrl</p>\n\n";

            $dbopts = parse_url($dbUrl);
            $dbHost = $dbopts["host"];
            $dbPort = $dbopts["port"];
            $dbUser = $dbopts["user"];
            $dbPassword = $dbopts["pass"];
            $dbName = ltrim($dbopts["path"],'/');
            try {
                 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
            }
            catch (PDOException $ex) {
                print "<p>error!: " . $ex->getMessage() . " </p>\n\n";
                die();
            }
           // print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";

            // foreach($db->query('SELECT image FROM coach WHERE age = 24')as $row ){
            //     echo $row['image'];
            // }

            // foreach ($db->query('SELECT name, age FROM coach') as $row)
            // {
            //     echo 'user: ' . $row['name'];
            //     echo ' age: ' . $row['age'];
            //     echo '<br/>';
            // }

        ?>


        <div class ="top-page">
                <a href="balltalla_academy_home.php"><div id= "header"></div></a>
            <div>
                <div id="sign"><button id="sign"><a href="signup.php">Sign up</a></button></div>
                <div id="log"><button id="log">Log in</button></div>
            </div>
        </div>

        <h1 id="title">BALLTALLA ACADEMY</h1>

        <div class ="middle-page">
            <div><a href="" class="middle-page-link">Who we are</a></div>
            <div><a href="" class="middle-page-link">Meet the coaches</a></div>
            <div><a href="" class="middle-page-link">Contact us</a></div>
        </div>

        <div class="picture">
            <img src="images/juventus.jpg" alt="" width="85%" height="400px">
        </div>

        <div class="who-we-are">
            <h2>Who WE are</h2>
        </div>

        <div class = "meet-the-coaches">
            <h2>Meet the coaches</h2>
            <div class="coaches-box">
                <div  class="grid-item">
                    <img src="images/<?php foreach($db->query('SELECT image FROM coach WHERE coach_id = 1')as $row ){echo $row['image']; }?>" alt="fab" width="auto" height="300px"> 
                    <p><?php foreach($db->query('SELECT description FROM coach WHERE coach_id = 1')as $row ){echo $row['description']; }?></p>
                </div>

                <div  class="grid-item">
                <img src="images/<?php foreach($db->query('SELECT image FROM coach WHERE coach_id = 2')as $row ){echo $row['image']; }?>" alt="fab" width="auto" height="300px"> 
                <p><?php foreach($db->query('SELECT description FROM coach WHERE coach_id = 2')as $row ){echo $row['description']; }?></p>
                </div>

                <div  class="grid-item">
                <img src="images/<?php foreach($db->query('SELECT image FROM coach WHERE coach_id = 4')as $row ){echo $row['image']; }?>" alt="fab" width="auto" height="300px"> 
                <p><?php foreach($db->query('SELECT description FROM coach WHERE coach_id = 4')as $row ){echo $row['description']; }?></p>
                </div>
            </div>
        </div>

    </body>


</html>