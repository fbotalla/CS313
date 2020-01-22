<html lang="en">
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>


<body>  

    <?php
    session_start();
    $nameErr = $emailErr = $lastNameErr = $stNameErr = $cityErr = $stateErr = $zipErr = "";
    $name = $email = $lastName = $stName = $city = $state = $zip = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
            }else{
                $nameCheck = true;
            }
        }

        if (empty($_POST["lastname"])) {
            $lastNameErr = "Surname is required";
        } else {
            $lastName = test_input($_POST["lastname"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
            $lastNameErr = "Only letters and white space allowed";
            }else{
                $lastNameCheck = true;
            }
        }
        
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST["street"])) {
                $stNameErr = "Street for your address is required";
            } else {
                $stName = test_input($_POST["street"]);
                if (!preg_match("/^(.+)\s(\S+)$/",$stName)) {
                $stNameErr = "Invalid street name format, please check your spaces";
            }
            }

            if (empty($_POST["city"])) {
                $cityErr = "City for your address is required";
            } else {
                $city = test_input($_POST["city"]);
                if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
                $cityErr = "Please enter a valid city";
            }
            }

            if (empty($_POST["state"])) {
                $stateErr = "State for your address is required";
            } else {
                $state = test_input($_POST["state"]);
                if (!preg_match("/^[a-zA-Z ]*$/",$state)) {
                $stateErr = "Please enter a valid state, enter the two letters or the entire state name";
            }
            }

            if (empty($_POST["zip"])) {
                $zipErr = "Zip code for your address is required";
            } else {
                $zip = test_input($_POST["zip"]);
                if (!preg_match("/^[1-9]*$/",$zip)) {
                $zipErr = "Only numbers";
            }
        }


        if($nameCheck == true && $lastNameCheck == true){
            header('Location: confirmation.php');
        
            exit();
        }
        
    }
  

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>

    <h2>PHP Form Validation Example</h2>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Name: <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    LastName: <input type="text" name="lastname" value="<?php echo $lastName;?>">
    <span class="error">* <?php echo $lastNameErr;?></span>
    <br><br>
    E-mail: <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    Street: <input type="text" name="street" value="<?php echo $stName;?>">
    <span class="error">* <?php echo $stNameErr;?></span>
    <br><br>
    City: <input type="text" name="city" value="<?php echo $city;?>">
    <span class="error">* <?php echo $cityErr;?></span>
    <br><br>
    State: <input type="text" name="state" value="<?php echo $state;?>">
    <span class="error">* <?php echo $stateErr;?></span>
    <br><br>
    Zip Code: <input type="text" name="zip" value="<?php echo $zip;?>">
    <span class="error">* <?php echo $zipErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">  
    </form>

</body>
</html>