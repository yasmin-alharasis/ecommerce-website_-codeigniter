<?php if(isset($_SESSION['user_Logged'])&& $_SESSION['user_type']=='member') { ?>
<?php $this->load->model('shoping_cart_model');
$id = $_SESSION['user_id'];
$item = $this->shoping_cart_model->fetch_all_item($id);

?>
<?php } ?>
<html>
<body>
    <div class="container">
        <div class="col-lg-12 col-md-12">
            <?php if(isset($_SESSION['success'])) { ?>    
            <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
            <?php

            }?>
                <br/>
                <h3 align="center">Shopping Cart</h3><br/>
                <div class="table-responsive">
                    <div align="right">
                        <?php echo form_open("/Shoping_cart/clearAllCart/".$_SESSION['user_id']); ?>
                            <button type="submit"  class="btn btn-warning" name="clearcart" >Clear Cart</button>
                        </form>
                    </div>
                    <br/>
                    <table class="table tabel-bordered">
                        <tr>
                            <th width="40%">Name</th>
                            <th width="15%">Quantity</th>
                            <th width="15%">Color</th>
                            <th width="15%">Price</th>
                            <th width="15%">Total</th>
                            <th width="15%">Action</th>
                        </tr>
                        <tr>
                        <?php foreach ($item as $row) {?>
                            
                            <td><?php echo $row["product_name"]?></td>
                            <td><?php echo $row["quantity"]?></td>

                            <td>
                            <?php foreach ($color as $colotItem):?>
                                <?php if( $row["color_id"] === $colotItem["color_id"]) { ?>
                                <div style="background-color:<?php echo $colotItem["color_value"]?>" >.</div>
                                <?php } ?> 
                            <?php endforeach; ?>
                            </td>
                            <td><?php echo $row["product_price"]?></td>
                            <td><?php echo $row["product_price"]*$row["quantity"]?></td>
                            <td>
                            <?php echo form_open("/Shoping_cart/deleteOrder/".$row['product_id']); ?>
                                <input type="submit" value="Delete" class="btn btn-danger" name="removeItem" id="<?php echo  $row["user_id"]?>">
                            </form>
                            </td>
                        </tr>
                        <?php
                            }
                        ?> 
                    </table>
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


</script>
