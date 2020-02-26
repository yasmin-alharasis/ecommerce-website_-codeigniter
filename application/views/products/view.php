<?php $this->load->model('product_model');
$pname = $item["pname"];
$productname = $this->product_model->fetch_sameproduct($pname);
$colors=[];
foreach( $productname as  $Name){
    $i=$Name["color_id"];
    array_push($colors,$i); 
}
?>
<div class="row">
    <div class="col-md-6">
        <br><br>
        <img  src="http://localhost/ci_shop/upload/<?php echo $item["image"]; ?>" width='200' hight='auto'/>
    </div>
    <div class="col-md-6">
    <br><br>
        <h3>Name of Product:</h3><br>
        <h6><?php echo $item["pname"]; ?></h6><br>
        <h3>price of Product:</h3><br>
        <h6><?php echo $item["price"]; ?></h6>
        <h3>Description:</h3>
        <h6><?php echo $item["description"]; ?></h6>
        <h3>Color</h3>
        <?php foreach ($color as $colotItem):?>
            <?php if( in_array($colotItem["color_id"],$colors)) { ?>

            <span style="background-color:<?php echo $colotItem["color_value"]?>" width="40px"><?php echo $colotItem["color_name"]?></span>
            <?php } ?> 
        <?php endforeach; ?>
        <?php echo form_open_multipart('shoping_cart/cartTodb'); ?>
            <div class="product" > 
            <?php if(isset($_SESSION['user_Logged'])&& $_SESSION['user_type']=='member') { ?>
            <input name="user_id" type="hidden" value="<?php echo $_SESSION['user_id']; ?>" > 
            <input name="product_id" type="hidden" value="<?php echo $item["id"]; ?>" > 
            <input name="pname" type="hidden" value="<?php echo $item["pname"]; ?>" >
            <input name="price" type="hidden" value="<?php echo $item["price"]; ?>" >  
            <?php } ?>
                <?php if(isset($_SESSION['user_Logged'])&& $_SESSION['user_type']=='member') { ?>
                <input 
                    type="number" value="0" autocomplete="off" name="quentity" min="1" max="10" step="1" id="<?php echo $item['id']; ?>"/>
                <button 
                type="submit" name="add_cart" style="margin-top: 5px;" class="btn btn-success add_cart" data-productname='<?php echo $item['pname']; ?>'
                data-price='<?php echo $item['price']; ?>' data-productid='<?php echo $item['id']; ?>' >ADD To Cart </button>
                <?php } ?>
                
        </div>
        </form>
        <?php echo form_open('auth/login'); ?>
        <?php if(isset($_SESSION['user_Logged'])== FALSE) { ?>
            <button style="margin-top: 5px;" class="btn btn-success not_login">ADD To Cart </button>
        <?php } ?>
        </form>
        </div>
    </div>
<script>
$(document).ready(function(){
    $('.not_login').click(function(){
        // alert("Please login");
    });
});
</script>
    