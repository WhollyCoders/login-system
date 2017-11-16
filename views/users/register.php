<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../../assets/css/custom.css">
  <title>Login System | Registration</title>
</head>
<body>
  <div class="container">

      <form id="form-register" class="form-signin" action="./process.php" method="post">
        <h2 class="form-signin-heading">Register</h2>
        <label for="username" class="sr-only">Email address</label>
        <input type="email" id="username" name="username" class="form-control" placeholder="Email address" required autofocus><br>
        <label for="firstname" class="sr-only">firstname</label>
        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Enter First Name" required><br>
        <label for="lastname" class="sr-only">lastname</label>
        <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Enter Last Name" required><br>
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Choose Password" required><br>
        <label for="password2" class="sr-only">Confirm Password</label>
        <input type="password" id="password2" name="password2" class="form-control" placeholder="Confirm Password" required><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Sign in</button>
        <p>Already have an account? <a href="../login/">Login</a></p>
      </form>

  </div> <!-- /container -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(){
        loginForm = document.getElementById("form-login");
        loginForm.reset();
      });
  </script>
</body>
</html>