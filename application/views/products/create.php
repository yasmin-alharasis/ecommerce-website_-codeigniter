<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

    <title>Create Product</title>
  </head>
  <body>
  <div class="row">
    <div class="col-md-4">
    <br><br>
    <div class="card">
        <div class="card-header">
            Menu
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item"><a href="<?php echo base_url();?>index.php/Shoping_cart/allproduct">Shop</a></li>
                <li class="list-group-item"><a href="<?php echo base_url();?>index.php/Shoping_cart/create">Create Product</a></li>
                <li class="list-group-item"><a href="<?php echo base_url();?>index.php/posts/create">Create Post</a></li>
                <li class="list-group-item"><a href="<?php echo base_url();?>index.php/posts">Post</a></li>
            </ul>
        </div>
    </div>
    </div>
    <div class="col-md-8">
    <h1>Create Product</h1>

    <?php if(isset($_SESSION['success'])) { ?>    
        <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
    <?php

    }?>

    <?php echo $error; ?>
    <?php echo form_open_multipart('shoping_cart/upload'); ?>
        <input type="hidden" name="category_id" value="1">
        <div class="form-group">
            <label for="pname" >Product Name:</label>
            <input class="form-control" name="pname" type="text" id="pname" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="price" >Price:</label>
            <input class="form-control" name="price" type="text" id="price" autocomplete="off">
        </div>   

        <div class="form-group">
            <label for="exampleFormControlFile1">Upload product photo</label>
            <?php echo form_upload(['name'=>'userfile']); ?>
        </div>

        <div>
           <button class="btn btn-primary" name="create">Create</button>
        </div>
        </form>
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  
  </body>
</html>