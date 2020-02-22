<!DOCTYPE html>
<html lang="en">
    <head>
        <title>batalla academy</title>       
        <link rel= "stylesheet" href="CSS/personal_portal.css">   
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>



        <?php
                session_start();
                
                    $dbUrl = getenv('DATABASE_URL');
                
                    if (empty($dbUrl)) {
                        $dbUrl = "postgres://postgres:Fabem2018!@localhost:5432/postgres";
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

                    foreach($db->query('SELECT hour,date FROM time')as $row){
                        $times[] = $row['hour'];
                        $dates[] = $row['date'];
                    }

                    foreach($db->query('SELECT name FROM coach')as $row){
                        $coach[] = $row['name'];
                        
                    }

                    foreach($db->query('SELECT name_of_place FROM location')as $row){
                        $location[] = $row['name_of_place'];
                        
                    }
            ?>


    
        <script> 
            $(function(){
                $("#header").load("header.html"); 
                $("#footer").load("footer.html"); 
            });
        </script>

        <script>
            String.prototype.rtrim = function () {
                    return this.replace(/((\s*\S+)*)\s*/, "$1");
                    }
        </script>
        
        <script>
            function bookForm(){

                 var coach = document.getElementById("coach");
                 var x = coach.options[coach.selectedIndex].value; 
                 var strCoach = x.rtrim();
                 
               
                var name = document.getElementById("name").value;
                

                
                var time = document.getElementById("time");
                var strTime = time.options[time.selectedIndex].value;

                 var array = strTime.split(' '),
                hour = array[0], date = array[1];
            
               var location = document.getElementById("location");
               var strLocation = location.options[location.selectedIndex].value;

              

                         
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                           document.getElementById("span_text").style.visibility = "visible";
                           document.getElementById("span_text").innerHTML = this.responseText;
                           
                        }
                    };
                    xmlhttp.open("GET", "booking.php?user=" + name + "&coach=" + strCoach + "&time=" + hour + "&date=" + date + "&location=" + strLocation, true);
                    xmlhttp.send();

                    return false;
     }
                  

        </script>
       
    </head>

    <body>

           
           

        <div class ="top-page">
                <a href="balltalla_academy_home.php"><div id= "header"></div></a>
            <div>
                <div id="sign"><button  class="btn btn-primary" id="sign"><a href="balltalla_academy_home.php">Sign Out</a></button></div>
                <div class="dropdown">
                    <button type="button" id="dropdown" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Dropdown button</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Book a training session</a>
                        <a class="dropdown-item" href="#">Cencel a training session</a>
                        <a class="dropdown-item" href="#">Your bookings</a>
                        <a class="dropdown-item" href="#">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
        <h1 id="title">BALLTALLA ACADEMY</h1>
        <h1 id="title">Welcome <?php echo $_SESSION["username"]; ?></h1>
        
     
        <div class="container" >
        <form action=""  method="POST" > 
                    <h5>Reserve a training session!</h5>
                    <hr>                  
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input readonly type="name" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $_SESSION["username"]?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Time</label>
                                <select name="time" class="form-control" id="time">
                                    <option value="">Select your preferred Time</option>
                                    <option value="<?php echo $times[0]. " " . $dates[0];  ?> "><?php echo $times[0] . " ". $dates[0] ;  ?></option>
                                    <option value="<?php echo $times[1]. " " . $dates[1];  ?> "><?php echo $times[1] . " ". $dates[1] ;  ?></option>
                                    <option value="<?php echo $times[2]. " " . $dates[2];  ?> "><?php echo $times[0] . " ". $dates[2] ;  ?></option>
                                    <option value="<?php echo $times[3]. " " . $dates[3];  ?> "><?php echo $times[1] . " ". $dates[3] ;  ?></option>
                                    <option value="<?php echo $times[4]. " " . $dates[4];  ?> "><?php echo $times[0] . " ". $dates[4] ;  ?></option>
                                    <option value="<?php echo $times[5]. " " . $dates[5];  ?> "><?php echo $times[1] . " ". $dates[5] ;  ?></option>
                                    <option value="<?php echo $times[6]. " " . $dates[6];  ?> "><?php echo $times[0] . " ". $dates[6] ;  ?></option>
                                    <option value="<?php echo $times[7]. " " . $dates[7];  ?> "><?php echo $times[1] . " ". $dates[7] ;  ?></option>
                                    <option value="<?php echo $times[8]. " " . $dates[8];  ?> "><?php echo $times[0] . " ". $dates[8] ;  ?></option>
                                    <option value="<?php echo $times[9]. " " . $dates[9];  ?> "><?php echo $times[1] . " ". $dates[9] ;  ?></option>
                                    <option value="<?php echo $times[10]. " " . $dates[10];  ?> "><?php echo $times[0] . " ". $dates[10] ;  ?></option>
                                    <option value="<?php echo $times[11]. " " . $dates[11];  ?> "><?php echo $times[1] . " ". $dates[11] ;  ?></option>
                                </select>

                                <label for="inputPassword4">Coach</label>
                                <select name="coach"  class="form-control" id="coach">
                                    <option value="">Select your preferred Coach</option>
                                    <option value="<?php echo $coach[0];  ?> "><?php echo $coach[0];  ?></option>
                                    <option value="<?php echo $coach[1];  ?> "><?php echo $coach[1];  ?></option>
                                    <option value="<?php echo $coach[2];  ?> "><?php echo $coach[2];  ?></option>
                                </select>

                                <label for="inputPassword4">Location</label>
                                <select name="location"  class="form-control" id="location">
                                    <option value="">Select your preferred location</option>
                                    <option value="<?php echo $location[0];  ?> "><?php echo $location[0];  ?></option>
                                    <option value="<?php echo $location[1];  ?> "><?php echo $location[1];  ?></option>
                                    <option value="<?php echo $location[2];  ?> "><?php echo $location[2];  ?></option>
                                    <option value="<?php echo $location[3];  ?> "><?php echo $location[3];  ?></option>
                                    <option value="<?php echo $location[4];  ?> "><?php echo $location[4];  ?></option>
                                </select>
                            </div>
                        </div>
                        <label for="inputAddress">Addiotional information</label>
                        <div class="form-group">
                      
                            <textarea name="Text" cols="40" rows="5"></textarea>
                        </div>            
                        <button type="submit" class="btn btn-primary" onclick="return bookForm()">Book</button>
                    </form>
                    <span id="span_text" style="visibility: hidden">SOmething</span>
                   
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