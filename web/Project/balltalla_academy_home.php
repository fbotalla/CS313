<!DOCTYPE html>
<html lang="en">
    <head>
        <title>batalla academy</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel= "stylesheet" href="CSS/balltalla_academy_home.css">   
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Sigmar+One&display=swap" rel="stylesheet">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <script> 
            $(function(){
                $("#header").load("header.html"); 
                $("#footer").load("footer.html"); 
            });
        </script> 

    </head>

    <body>

        <?php
            $dbUrl = getenv('DATABASE_URL');

            if (empty($dbUrl)) {
                 $dbUrl = "postgres://postgres:xxxx@localhost:5432/postgres";
            }
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
        ?>


        <div class ="top-page">
                <a href="balltalla_academy_home.php"><div id= "header"></div></a>
            <div>
                <div id="sign"><button id="sign"><a href="signup.php">Sign up</a></button></div>
                <div id="log"><button id="log"><a href="login.php">Log in</a></button></div>
            </div>
        </div>

        <h1 id="title">BALLTALLA ACADEMY</h1>

        <div class ="middle-page">
            <div><a href="#us" class="middle-page-link">Who we are</a></div>
            <div><a href="#coaches" class="middle-page-link">Meet the coaches</a></div>
            <div><a href="#contact" class="middle-page-link">Contact us</a></div>
        </div>

        <div class="picture">
            <img src="images/juventus.jpg" alt="" width="85%" height="600px">
        </div>

        <div class="who-we-are">
            <h2 id="us">Who WE are</h2>
            <div class="paragraph"><p>Balltalla Academy is a new organization established in January of 2020. Balltalla Academy mission is to provide specialized trainings to people interested improving their soccer skills.
            Balltalla Academy's trainers are all ex semi or professional soccer players. Balltalla Academy is specialized in 1on1 tranings or department training (offense, difense, midfield, wings etc..). Balltalla academy
            also provides consulting to local and national institution to better their trainings and their playing techniques. Our trainers have made a difference while playing for their respective
            teams so we know they will make a difference for those whom they train. Balltalla Academy is also currently receving application to become a soccer team within the next year! Stay tuned for
            tryouts times.  </div>
            </p>
        </div>
            
        <div class = "meet-the-coaches">
            <h2 id="coaches">Meet the coaches</h2>
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

        <div id="buttom-page">
        <h2 id="contact">Contact us</h2>
        <div class="contact-us">
                <div class="info">
                    <h5>Contact Info</h5>
                    <hr>
                        <ul>
                            <dt class="list-group-item"><span class="glyphicon glyphicon-envelope"></span> info@fbotalla.com</dt>
                            <dt class="list-group-item"><span class="glyphicon glyphicon-phone"></span> 808-999-9999/808-999-9999</dt>
                            <dt class="list-group-item"><i class='fas fa-home'></i> Some address</dt>
                        </ul>
                </div>
              
                    <form action="mailto:erbota7@gmail.com" enctype="text/plain" method="POST"> 
                    <h5>Get in touch with us today!</h5>
                    <hr>                  
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Name</label>
                                <input type="Name" class="form-control" id="inputEmail4" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Email</label>
                                <input type="Email" class="form-control" id="Email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Subject</label>
                            <input type="Subject" class="form-control" id="Subject">
                        </div>
                        <div class="form-group">
                            <textarea name="Text" cols="40" rows="5"></textarea>
                        </div>            
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
            

             </div>
            </div>
        

       <div id="footer"></div>

    </body>
</html>