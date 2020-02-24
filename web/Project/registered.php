<!DOCTYPE html>
<html>
<head>

</head>


<body>
    
<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

    if(!empty($username) || !empty($email) || !empty($password)){
        $dbUrl = getenv('DATABASE_URL');

        if (empty($dbUrl)) {
             $dbUrl = "postgres://postgres:xxxxx@localhost:5432/postgres";
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

        $stmt = $db->prepare('SELECT email FROM person WHERE email = :email');
        $stmt->execute(array('email' => $email));
        $num_rows = 0;
        foreach($stmt as $num_rows){
            $num_rows++;
        }

    

        if($num_rows >= 1){
            $result = "Cannot complete registration. This email is already being used. Please go back and try again";
        }
        else{
            $preparedInsert = $db->prepare('INSERT INTO person (username, email, password) VALUES (:username, :email, :password)');
            $preparedInsert->execute(array('username' => $username, 'email' => $email, 'password' => $password));
            $result = "Thanks for registering! To acces your portal please follow this link " .'<a href="login.php">Log in</a>'. " Thanks!";
        }
        

    }else{
        echo "All fields are required!";
        die();
    }

?>

<p><?php echo $result ?></p>



</body>



</html>