<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

    <title>profile page</title>
  </head>
  <body>
   
    <div class="col-md-5 col-md-offset-2">
    <h1>Profile page</h1>
    
    <?php if(isset($_SESSION['success'])) { ?>
        <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
    <?php

    }?>
 
    <!-- Hello <?php echo $_SESSION['username'];  ?><br> -->

    <?php print_r($this->session->all_userdata());?>
    <br><br>
    <a href="<?php echo base_url(); ?>auth/logout">Logout</a>
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  
  </body>
</html>
