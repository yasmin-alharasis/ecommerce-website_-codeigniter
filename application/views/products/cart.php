<html>
<body>
    <div class="container">
        <div class="col-lg-12 col-md-12">
            <?php if(isset($_SESSION['success'])) { ?>    
            <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
            <?php

            }?>
            <div id="cart_details">
                <h3 align="center">Cart is Empty</h3> 
            </div>
        </div>
    </div>
</body>
</html>
<script>
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

                }

            });
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
                    window.location.reload();
                    alert("Product removed from Cart");
                    
                    // $('#cart_details').html(data);
                   
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
    })
})

// function loadview()
// {

//     $.ajax({
//         url:
//         method : "get",\
//         success: function(data)
//         {


//         }


//     })
// }


// function load()
// {   
//     echo $this->view();
// }
</script>
