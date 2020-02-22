<?php



 $user = $_REQUEST["user"];
 $coach = $_REQUEST["coach"];
 $time = $_REQUEST["time"];
 $date = $_REQUEST["date"];
 $location = $_REQUEST["location"];



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

$stmt = $db->prepare('SELECT person_id FROM person WHERE username = :username ');
$stmt->execute(array('username' => $user ));

foreach($stmt as $num_rows){
  $person_id = $num_rows['person_id'];
}


$stmt = $db->prepare('SELECT coach_id FROM coach WHERE name = :name ');
$stmt->execute(array('name' => $coach ));

foreach($stmt as $num_rows){
  $coach_id = $num_rows['coach_id'];
}

$stmt = $db->prepare('SELECT location_id FROM location WHERE name_of_place = :name_of_place ');
$stmt->execute(array('name_of_place' => $location ));

foreach($stmt as $num_rows){
  $location_id = $num_rows['location_id'];
}

$stmt = $db->prepare('SELECT time_id FROM time WHERE hour = :time AND date = :date ');
$stmt->execute(array('time' => $time, 'date' => $date ));

foreach($stmt as $num_rows){
  $time_id = $num_rows['time_id'];
}





                        foreach($db->query('SELECT coach_id FROM coach WHERE name = Fabrizio Botalla')as $row){
                            $coachFinal = $row['coach_id'];
                        }
    
                        foreach($db->query('SELECT person_id FROM person WHERE name = $user')as $row){
                            $personFinal[] = $row['person_id'];
                         }
                    
                        foreach($db->query("SELECT time_id FROM time WHERE hour = $hour, date = $date'")as $row){
                            $timeFinal[] = $row['time_id'];
                        }
    
                        foreach($db->query("SELECT location_id FROM location WHERE name_of_place = $location")as $row){
                            $locationFinal[] = $row['location_id'];
                         }
    
                        
                       

                $preparedInsert = $db->prepare('INSERT INTO person_schedule (person_id, instructor_id, location_id,time_id) VALUES (:username, :coach, :location, :time)');
                $preparedInsert->execute(array('username' => $person_id, 'coach' => $coach_id, 'location' => $location_id, 'time' => $time_id));

                         echo "Booking successful!"

?>