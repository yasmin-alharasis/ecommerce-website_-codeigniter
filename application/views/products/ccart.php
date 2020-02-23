<!-- <!doctype html>
<html>
<head>

    <title>Shopping Cart</title>

    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
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
    </style>
</head>
<body>


    <div class="container " style="width: 65%">
    
    <div style="clear: both"></div>
        <h3 class="title2">Shopping Cart Details</h3>
        <div class="table-responsive">
            <table class="table table-bordered" id='myTable'>
            <tr>
                <th width="30%">Product Name</th>
                <th width="13%">Price Details</th>
                <th width="17%">Remove Item</th>
            </tr>
  
            <tr id='idrow'>
                <td id="ddd" ></td>
                <td id="lll" ></td>
                <td><a onclick='removerow(event)'  href="">delete</a></td>
            </tr>

            </table>
            
        </div>
    </div>

</body>
</html>

<script>
debugger;
const urlParams = new URLSearchParams(window.location.search);
const myParam = urlParams.get('pname');
const Param = urlParams.get('price');


document.getElementById("ddd").innerHTML = myParam;
document.getElementById("lll").innerHTML = Param;


// function removerow(sender)
// {
//     debugger;
//     $(sender).closest("tr").remove();

// }


function removerow(event) {
    debugger;
         
    // $(sender).closest("tr").remove();
    document.getElementById("idrow").remove();
   
    event.preventDefault();

        }
</script> -->
