<!-- <?php
session_start();
?> -->
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
        h2{
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
            <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
            <?php

            }?>
            
            <?php
                foreach ($product as $row)
                {
            ?>
                
                <div class="col-md-3">
                <?php echo form_open_multipart('shoping_cart/cartTodb'); ?>
                <!-- <form action="" method="POST"  name="cart"> -->
                <div class="product" > 

                <input name="user_id" type="hidden" value="<?php echo $_SESSION['user_id']; ?>" > 
                <input name="product_id" type="hidden" value="<?php echo $row["id"]; ?>" > 
                <input name="pname" type="hidden" value="<?php echo $row["pname"]; ?>" >
                <input name="price" type="hidden" value="<?php echo $row["price"]; ?>" >  
                

                    <img class="img-sty" src="http://localhost/codeigniter_crud_system/upload/<?php echo $row["image"]; ?>" class="img-responsive" /> 
                    <h5 class="text-info"><?php echo $row["pname"]; ?></h5>  
                    <h5 class="text-danger"><?php echo $row["price"]; ?></h5>  
                    <input type="text" name="quentity" id="<?php echo $row['id']; ?>" >
                    <button type="submit" name="add_cart" style="margin-top: 5px;" class="btn btn-success add_cart" data-productname='<?php echo $row['pname']; ?>'
                    data-price='<?php echo $row['price']; ?>' data-productid='<?php echo $row['id']; ?>' >ADD To Cart </button>
                </div>
                </div>
                </form>
            <?php
                }
            ?>   
            </div>
           </div>
           </div>
           <!-- <div class="container">
           <div class="col-lg-12 col-md-12">
                <div id="cart_details">
                    <h3 align="center">Cart is Empty</h3> 
                </div>
           </div>
           </div> -->


</body>
</html>
<script>
debugger
$(document).ready(function(){
    console.log("DOM is ready");
    $('.add_cart').click(function(){
        console.log("add_cart is ready");
        var product_id = $(this).data("productid");
        var product_name = $(this).data("productname");
        var product_price = $(this).data("price");
      
        var quentity = $("#"+product_id).val();
        if( quentity !='' && quentity>0)
        {
            $.ajax({
                url:"<?php echo base_url(); ?>Shoping_cart/add",
                method: "POST",
                data:{ 
                    product_id:product_id,
                    product_name:product_name,
                    product_price:product_price,
                    quantity:quentity
                },
                success:function(data)
                {   
                    
                    alert("Product Added into Cart");
                    $('#cart_details').html(data);
                    redirect("product/cart");

                }
            });
            // $.ajax({
            //     url:"<?php echo base_url(); ?>Shoping_cart/count",
            //     method: "POST",
            //     data:{ 
            //         product_id:product_id,
            //         product_name:product_name,
            //         product_price:product_price,
            //         quantity:quentity
            //     },
                
            //     success:function(data)
            //     {
            //         alert(" Added notification");
            //         document.getElementById("count").innerHTML = data;
            //     }
            //     error:function()
            //     {
            //         alert('Error');
            //     }
           

            // });
            
        }
        else
        {
            alert("please Enter quentity");
        }
        
    });


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

//     $(document).on('click','.add_cart',function(){
        
//         var product_id = $(this).data("productid");
//         var quentity = $("#"+product_id).val();

//         if( quentity !='' && quentity>0)
//         {   
//             $.ajax({
//                 url:"<?php echo base_url(); ?>Shoping_cart/cartTodb",
//                 method: "POST",
//                 data:{ 
//                     product_id:product_id,
//                     product_name:product_name,
//                     product_price:product_price,
//                     quantity:quentity },

//             success:function(data)
//             {
//                 alert("success");
//             }
//             error:function(data)
//             {
//                 alert("error");
//             }
//         });
//         }

// })


})

</script>

