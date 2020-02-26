<div class="row">
    <div class="col-md-4">
        <h1>All Product</h1>
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
    <br>
    <div class="col-md-8">
        <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Color</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($product as $item): ?>
            <tr>
                <td><img  src="http://localhost/ci_shop/upload/<?php echo $item["image"]; ?>" width='40'/></td>
                <td><?php echo $item["pname"]; ?></td>
                <td><?php echo $item["quentity"]; ?></td>
                <td>
                <?php foreach ($color as $colotItem):?>
                    <?php if( $item["color_id"] === $colotItem["color_id"]) { ?>
                    <!-- <?php echo $colotItem["color_name"]?> -->
                    <div style="background-color:<?php echo $colotItem["color_value"]?>" width="40px">.</div>
                    <?php } ?> 
                <?php endforeach; ?>
                </td>
                <td><?php echo $item["price"]?></td>
                <td>
                    <!-- <a class="btn btn-info btn-sm" href="<?php echo site_url('/products/edit/'.$item['id']); ?>">Edit</a> -->
                    <?php echo form_open("/Shoping_cart/delete/".$item['id']); ?>
                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                    </form>
                </td>
            </tr>    
        <?php endforeach; ?>
        </tbody>
        </table>
    </div>
</div>
 