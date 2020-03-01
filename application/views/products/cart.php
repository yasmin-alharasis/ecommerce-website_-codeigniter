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
                                <input name="color_id" type="hidden" value="<?php echo $row["color_id"]; ?>" /> 
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

