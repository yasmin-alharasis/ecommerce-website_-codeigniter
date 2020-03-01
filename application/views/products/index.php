<?php $this->load->model('shoping_cart_model');
$productsname=[];
$product_data=[];
 foreach( $product as  $Name){
    $i=$Name["pname"];
    $product_id=$Name["id"];
    
if (!in_array($i, $productsname)) {
    array_push($productsname,$i);
    array_push($product_data,$product_id); 
}
}
?>
<!doctype html>
<html>
<head>

    <title>Shopping Cart</title>

    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <script type="text/javascript" src='<?= base_url("assets/js/jquery-3.4.1.js"); ?>'></script>
    <script type="text/javascript" src='<?= base_url("assets/js/bootstrap.min.js"); ?>'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


            
    <style>
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
            
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2,span{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
        .img-sty {
            max-width: 200;
            height: 200;
        }
        
</style>
</head>
<body>
<?php

?>

    <div class="container" >
        <h2>Shopping Cart</h2>
            <div class="row">
            

            <?php if(isset($_SESSION['error'])) { ?>    
            <div class="alert alert-success"><?php echo $_SESSION['error']; ?></div>
            <?php

            }?>
            
            <?php
                foreach ($product as $row)
                {
            ?>
                <?php if(in_array($row["id"],$product_data)) { ?>
                <div class="col-md-3">
                <a href="<?php echo site_url('/product/'.$row['id']); ?>">
                    <div class="product" > 
                    <input name="product_id" type="hidden" value="<?php echo $row["id"]; ?>" > 
                    <input name="pname" type="hidden" value="<?php echo $row["pname"]; ?>" >
                    <input name="price" type="hidden" value="<?php echo $row["price"]; ?>" >  
                    <img class="img-sty" src="http://localhost/ci_shop/upload/<?php echo $row["image"]; ?>" class="img-responsive" /> 
                    <h5 class="text-info"><?php echo $row["pname"]; ?></h5>  
                    <h5 class="text-danger"><?php echo $row["price"]; ?></h5>  
                    <p> lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
                    <p><button>Add to Cart</button></p>  
                </a>
                </div>
                </div>
                <?php } ?>
            <?php
                }
            ?>   
            </div>
           </div>
           </div>

</body>
</html>
<script>
debugger
// When the user clicks on <div>, open the popup
$(document).ready(function(){
    console.log("DOM is ready");
    $('.add_cart').click(function(){
        console.log("add_cart is ready");
        var product_id = $(this).data("productid");
        var product_name = $(this).data("productname");
        var product_price = $(this).data("price");
      
        var quentity = $("#"+product_id).val();
        if( quentity !='' && quentity>0 )
        {   
            alert("Product Added into Cart");
        }else
        {
            alert("please Enter quentity");
        }
    });
  
    
// When the user clicks on div, open the popup

    $('#cart_details').load("<?php echo base_url(); ?>Shoping_cart/load");

    $(document).on('click','.remove_inventory',function(){
        var row_id = $(this).attr("id");//table row id
        if(confirm("Are you sure you want to remove this?"))
        {
            $.ajax({ 
                url:"<?php echo base_url(); ?>Shoping_cart/remove",
                method: "POST",
                data:{row_id:row_id},
                succcess:function(data)
                {
                    alert("Product removed from Cart");
                    $('#cart_details').html(data);
                }
            });  
        }
        else
        {
            return false;
        }
    });

    $(document).on('click','#clear_cart',function(){
        if(confirm("Are you sure you want to clear cart?"))
        {
            $.ajax({
                url:"<?php echo base_url(); ?>Shoping_cart/clear",
                success:function(data)
                {
                    alert("Cart removed successfully");
                    $('#cart_details').html(data);
                }

            });
        }
        else{
            return false;
        }
    });

    $('#count').load("<?php echo base_url(); ?>Shoping_cart/count");

});

</script>

