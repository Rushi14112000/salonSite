<?php
include 'config.php';

session_start();

if(isset($_SESSION['mobile'])){
  header("Location:yetToDefine");
}

  if(isset($_POST['submit'])){
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition register-page" style="background-color: #e3f2fd;">



<div class="register-box" >
  <div class="register-logo" >
    <p><strong>Login</strong></p>
  </div>

  <div class="card" >
    <div class="card-body register-card-body" style="background-color: #1f2833;">

    <form action="#" method="post">

        <div class="input-group mb-3">
          <input type="tel" class="form-control" name="mobile" placeholder="Mobile Number" minlength="10" maxlength="10" pattern="^[6-9][0-9]*$" required oninput="if(!this.value.match('^[6-9][0-9]*$'))this.value='';" style="background-color: #e3f2fd;">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="must contain atleast one number and one uppercase and lowercase letter , and at least 8 or more characters" required style="background-color: #e3f2fd;">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-eye" id="togglePassword"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-block" style="background-color: #e3f2fd;">Login</button>
          </div>
          <!-- /.col -->
        </div>
        </form>

      <a href="regShopOwner.php" class="text-center">Don't have an account!</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="public/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/admin/dist/js/adminlte.min.js"></script>

<script>
    // To hide and unhide the passwords
    var password = document.getElementById("password");
    var confirmPassword = document.getElementById("confirm_password");
    const togglePassword = document.querySelector('#togglePassword');
    togglePassword.addEventListener('click', function(e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });

</script>
</body>
</html>
