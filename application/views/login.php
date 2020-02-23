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
    
    
 
    <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
      <div class="container">
      <div class="col-md-8 col-md-offset-4 col-vertical-4">
        <div class="card" >
        <?php if(isset($_SESSION['success'])) { ?>
        <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div> 
        <?php
        }?>
        <?php if(isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
        <?php
        }?>
        <h5 class="card-header">Login</h5>
    <form action="loginauth" method="POST" >
        <div class="card-body">
        <div>
            <label >Username:</label><br>
            <input class="col-md-4" name="username" type="text" id="form_username" autocomplete="off" >
            <small class="error_form col-md-4" id="username_error_message"></small>  
            <span class="text-danger"><?php echo form_error('username'); ?></span>             
        </div>
        <div>
            <label >Password:</label><br>
            <input class="col-md-4" name="password" type="password" id="form_password" autocomplete="off" >
            <small class="error_form" id="password_error_message"></small>
        </div>
        <div>
          <input class="btn btn-primary" type="submit"  id="submit" name="login" style="float: right;">

        </div>
        </form>
        </div>

        <div class="card-footer">
          <span > No account!! <a href="register">Sign Up </a></span>       
        </div>    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://localhost/ci_shop/assets/js/validatelogin.js"></script> 
    <script type="text/javascript" src="http://localhost/ci_shop/assets/js/jquery-3.4.1.js"></script>
  </body>
</html>
