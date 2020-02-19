<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->
<head>
<link rel= "stylesheet" href="CSS/login.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script> 
        $(function(){
            $("#header").load("header.html"); 
            $("#footer").load("footer.html"); 
        });
 </script> 

   <script>
    function validatePassword() {
        var validator = $("#loginForm").validate({
            rules: {
                password: "required",
                confirmpassword: {
                    equalTo: "#password"
                }
            },
            messages: {
                password: " Enter Password",
                confirmpassword: " Enter Confirm Password Same as Password"
            }
        });
        if (validator.form()) {
            alert('Sucess');
        }
    }
 
    </script>

</head>
<body>

<?php

$username = $_POST["username"];
$password = $_POST["password"];

if(!empty($username) || !empty($password)){
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

    $stmt = $db->prepare('SELECT password FROM person WHERE username = :username ');
    $stmt->execute(array('username' => $username ));

    foreach($stmt as $num_rows){
      $pass = $num_rows['password'];
  }


    //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // $stmt = $db->prepare('SELECT username,password FROM person WHERE username = :username AND password = :password');
    // $stmt->execute(array('username' => $username , 'password'=> $password));

    // $num_rows = 0;

    // foreach($stmt as $num_rows){
    //     $num_rows++;
    // }

    if(password_verify($password, $pass)){
      session_start();
      $_SESSION["username"] = $username;
      header("Location: personal_portal.php"); 
    }
    else{
        $result = "Unable to log in. Please re-enter a valid username and password.";
    }
}
?> 

<div class ="top-page">
        <a href="balltalla_academy_home.php"><div id= "header"></div></a>
    </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
  <div class="card-img-left d-none d-md-flex">
  </div>
       <div class="card-body">
          <h5 class="card-title text-center">Login </h5>
          <form class="form-signin" method="POST" action="">

                <div class="form-label-group">
                  <input type="text" id="inputUserame" class="form-control" name="username" placeholder="Username" required autofocus>
                  <label for="inputUserame">Username</label>
                </div>

                <hr>

                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                  <label for="inputPassword">Password</label>
                </div>
                
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Log In</button>
                <a class="d-block text-center mt-2 small" href="#">Forgot username or password?</a>
                <a class="d-block text-center mt-2 small" href="signup.php">Create an account</a>
                <p id="result"><?php echo $result?></p>
                <hr class="my-4">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  <div id="footer"></div>
</body>