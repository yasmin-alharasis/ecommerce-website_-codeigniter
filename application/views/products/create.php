<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <script type="text/javascript" src='<?= base_url("assets/js/jquery-3.4.1.js"); ?>'></script>
    <script type="text/javascript" src='<?= base_url("assets/js/bootstrap.min.js"); ?>'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" type="text" id="description"></textarea>
        </div>
        <div class="row col-md-12">
        <div class="round col-md-4">
            <button id="checkbox" type="button" class="btn btn-outline-secondary">Add Attribute</button>
        </div>
        <div class="attributes">
        <div class="form-group">
            <div class="row">
                <Label class=" col-md-6" for="color">Color:</Label>
                <label class=" col-md-5" for="quentity">Quentity</label>
            </div>
            <div class="row">
            <select  class=" form-control col-md-6" id="color" name="color">
            <option value="" selected></option>
            <?php foreach($color as $row) { ?>
                <option value="<?php echo $row['color_id']; ?>"><?php echo $row['color_name']; ?></option>
            <?php
                }
            ?> 
            </select>&nbsp;
            <input  class="form-control col-md-5" type="number" value="0" autocomplete="off" name="quentity" min="1" max="100" 
                    step="1" id="<?php echo $row['color_id']; ?> "/>
            </div>
        </div>
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
<script>
debugger
$(document).ready(function(){
    console.log("DOM is ready");
    
    // $('.attributes').hide();
    $('#checkbox').click(function(){
        $('.attributes').append(' <div class="row"><Label class=" col-md-6" for="color">Color:</Label><label class=" col-md-5" for="quentity">Quentity</label></div><div class="row"><select  class=" form-control col-md-6" id="color" name="color"><option value="" selected></option><?php foreach($color as $row) { ?><option value="<?php echo $row['color_id']; ?>"><?php echo $row['color_name']; ?></option><?php }?> </select>&nbsp;<input  class="form-control col-md-5" type="number" value="0" autocomplete="off" name="quentity" min="1" max="100" step="1" id="<?php echo $row['color_id']; ?> "/></div>');
    });
});
</script>

