<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <script type="text/javascript" src="http://localhost/ci_shop/assets/js/jquery-3.4.1.js"></script>    
    <script src="https://code.jquery.com/jquery-3.4.1.js" 
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <title>Register page</title>
    
  </head>
  <body>
    
    <div class="container">
    <div class="col-md-8 col-md-offset-4 col-vertical-4">   
    <?php if(isset($_SESSION['success'])) { ?>
        <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div> 
    <?php
    }?>
    <?php if(isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
    <?php
    }?>
    <div class="card">
        <h5 class="card-header">Register</h5>
    <form  method="POST" action="validate" >
        <input name="user_type" type="hidden" id="user_type" >
        <div class="card-body">
        <div>
            <Label>Username:</Label><br>
            <input class=" col-md-4" type="text" name="username" id="form_username" autocomplete="off">
            <small class="error_form col-md-4" id="username_error_message"></small>    
        </div>
        <div>
            <Label>Email:</Label><br>
            <input class=" col-md-4" type="text" id="form_email" name="email" autocomplete="off">
            <small class="error_form" id="email_error_message"></small>
        </div>
        <div>
            <Label>Password:</Label><br>
            <input class=" col-md-4" type="password" id="form_password" name="password" autocomplete="off">
            <small class="error_form" id="password_error_message"></small>
        </div>
        <div>
            <Label>Coniform Password:</Label><br>
            <input class=" col-md-4" type="password" id="form_ConiformPassword" name="password2">
            <small class="error_form" id="ConiformPassword_error_message"></small>
        </div>
        <div>
            <Label for="gender">Gender:</Label><br>
            <select  class=" col-md-4" id="form_gender" name="gender">
                <option value="" selected></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <small class="error_form" id="gender_error_message"></small>
        </div>
        <div>
            <Label>Phone:</label><br>
            <input class="col-md-4" type="text" id="form_phone" name="phone" autocomplete="off">
            <small class="error_form" id="phone_error_message"></small>
        </div>
        <div >
            <input class="btn btn-primary" type="submit"  id="submit" name="register" style="float: right;">
        </div>
    </form>
    <br>
        
    </div>
    <div class="card-footer">
          <span > Aready Have Account <a href="login">LogIn</a></span>       
        </div> 
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://localhost/ci_shop/assets/js/validateRegister.js"></script> 
    <script type="text/javascript" src="http://localhost/ci_shop/assets/js/jquery-3.4.1.js"></script>
  </body>
</html>

