<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->
<head>
<link rel= "stylesheet" href="CSS/signup.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script> 
        $(function(){
            $("#header").load("header.html"); 
            $("#footer").load("footer.html"); 
        });
 </script> 
 <script>

 $('#inputPassword, #inputConfirmPassword').on('keyup', function () {
  if ($('#inputPassword').val() == $('#inputConfirmPassword').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
 
 </script>


</head>
<body>

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
          <h5 class="card-title text-center">Register</h5>

          <form class="form-signin" action="registered.php" method="POST"  oninput='password.setCustomValidity(password.value != pass.value ? "Passwords do not match." : "")'>

            <div class="form-label-group">
              <input type="text" id="inputUserame" class="form-control" name="username" placeholder="Username" required autofocus>
              <label for="inputUserame">Username</label>
            </div>

            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required>
              <label for="inputEmail">Email address</label>
            </div>
             <hr>

            <div class="form-label-group">
              <input id="password1" type=password class="form-control" required name='pass'>
              <label for="password1">Password</label>
            </div>

            <div class="form-label-group">
            <input id="password2" type=password class="form-control" name='password'>
            <label for="password2">Confirm password:</label>
            </div>

            <span id='message'></span>

            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
            <a class="d-block text-center mt-2 small" href="login.php">Log In</a>
            <hr class="my-4">
          </form>
        </div>
        </div>
      </div>
    </div>
  </div>
  <div id="footer"></div>
</body>