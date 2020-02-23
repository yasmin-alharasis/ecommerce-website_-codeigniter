
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
    <h1>Create Post</h1>
<?php echo validation_errors(); ?>
<?php echo form_open('posts/create'); ?>
  <div class="form-group">
    <label >Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title" autocomplete="off">
  </div>
  <div class="form-group">
    <label >Body</label>
    <textarea class="form-control" name="body" placeholder="Add body" autocomplete="off"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>

