<h2><?php echo $post['title']; ?></h2>
<small  class="post-date">Posted on: <?php  echo $post['created_at'];?></small><br/>
<div class="post-body">
    <?php echo $post['body']; ?>
</div>
<hr>
<?php echo form_open("/posts/delete/".$post['id']); ?>
    <input type="submit" value="Delete" class="btn btn-danger">
</form>
<?php echo form_open("/posts/edit/".$post['slug']); ?>
    <input type="submit" value="Edit" class="btn btn-info">
</form>
