<!DOCTYPE html>
<html>
<head>

</head>


<body>
    
<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($username) || !empty($email) || !empty($password)){
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

        $psql = "INSERT INTO person (name, email, password)
        VALUES ('".$username."','".$email."','".$password."')";
        $db->query($psql);
        

    }else{
        echo "All fields are required!";
        die();
    }

?>

<p>Hello!</p>



</body>



</html>