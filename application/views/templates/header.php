<?php if(isset($_SESSION['user_Logged'])&& $_SESSION['user_type']=='member') { ?>
<?php $this->load->model('shoping_cart_model');
$id = $_SESSION['user_id'];
$item = $this->shoping_cart_model->fetch_all_item($id);

?>
<?php } ?>
<html>
    <head>
        <title>codigniter</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">    
        <script type="text/javascript" src='<?= base_url("assets/js/jquery-3.4.1.js"); ?>'></script>
        <script type="text/javascript" src='<?= base_url("assets/js/bootstrap.js"); ?>'></script>
        <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

    </head>
    <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <?php if(isset($_SESSION['user_Logged'])&& $_SESSION['user_type']=='member') { ?>
      <a class="navbar-brand" href="<?php echo base_url();?>index.php/Shoping_cart/index">Shop</a>
      <?php } ?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      
        <span class="navbar-toggler-icon"></span>
            
      </button>
      
      <div class="collapse navbar-collapse" id="navbarColor01">


        <ul class="navbar-nav mr-auto">
        <!-- <?php if(isset($_SESSION['user_Logged'])&& $_SESSION['user_type']=='admin')  { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>index.php/Shoping_cart/create">Create Product</a>
          </li>
        <?php } ?> -->
        <!-- <?php if(isset($_SESSION['user_Logged'])&& $_SESSION['user_type']=='admin') { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>index.php/posts/create">Create Post</a>
          </li>
        <?php } ?> -->
        <?php if(isset($_SESSION['user_Logged'])&& $_SESSION['user_type']=='member') { ?>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url();?>index.php/posts">Post</a>
          </li>
          <?php } ?>
        <?php if(isset($_SESSION['user_Logged'])&& $_SESSION['user_type']=='member') { ?>
          <li class="nav-item">
            <!-- <a class="nav-link" href="<?php echo base_url();?>index.php/user/profile">Profile</a> -->
            <a class="nav-link" href="<?php echo base_url();?>index.php/Auth/profile">Profile</a>
          </li>
        <?php } ?>
        <?php if(isset($_SESSION['user_Logged'])&& $_SESSION['user_type']=='admin') { ?>
          <li class="nav-item">
            <!-- <a class="nav-link" href="<?php echo base_url();?>index.php/user/profile">Profile</a> -->
            <a class="nav-link" href="<?php echo base_url();?>index.php/Auth/dashboard">Dashboard</a>
          </li>
        <?php } ?>
        </ul>


        <ul class="nav navbar-nav navbar-right">
        <?php if(!isset($_SESSION['user_Logged'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>index.php/auth/login">Login</a>
            </li>
        <?php } ?>
        <?php if(!isset($_SESSION['user_Logged'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>index.php/auth/register">Register</a>
            </li>
        <?php } ?>
        <?php if(isset($_SESSION['user_Logged'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>index.php/auth/logout">Logout</a>
            </li>
        <?php } ?>
        <?php if(isset($_SESSION['user_Logged']) && $_SESSION['user_type']=='member') { ?>

            <li class="nav-item">         
                <a class="nav-link" href="<?php echo base_url();?>index.php/Shoping_cart/cart">
                  <img src="http://localhost/codeigniter_crud_system/assets/image/shopping-cart.png" style="width:40px ">

                  <?php
                  $output=[];
                      foreach ($item as $row)
                      {
                  ?>
                  <?php
                      $i=$row["quantity"];
                      array_push($output,$i); 
                  ?>
                  <?php
                      }
                      $total= array_sum( $output );
                      // echo $total;
                  ?> 
                  <span id="count" class="badge badge-danger" data-target="#count"><?php echo $total; ?></span>
                  
                </a>
            </li>
        <?php } ?>
        </ul>
    </div>
    
  
</nav>

<div class="container">
