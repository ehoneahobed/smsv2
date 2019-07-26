 <?php


?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery-ui.min.js"></script>

  <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/fontawesome-free-5.9.0/css/fontawesome.min.css">
  <script type="text/javascript" src="fonts/fontawesome-free-5.9.0/js/fontawesome.min.js"></script>

  <script type="text/javascript" src="js/mainscript.js"></script>
  <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.3.custom.min.css">
  <link rel="stylesheet" type="text/css" href="css/mainstyles.css">
</head>
<body>

<div class="container dashboard-container" style="">
  <div class="row">
       <div class="col-md-12 jumbotron">
      

      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><b>New Transaction</b></h5>
              <p class="card-text">Here you can make new sales, and get invoice</p>
              <a href="newsale.php" class="btn btn-primary btn-lg">Make a sale</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><b>Products</b></h5>
              <p class="card-text">Here you can add and manage product stocks</p>
              <a href="#" class="btn btn-success btn-lg" data-toggle="modal" data-target="#form_product">Add</a>
              <a href="#" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#updateProductModal">Manage</a>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><b>Expenses</b></h5>
              <p class="card-text">Record and review various expenses made</p>
              <a href="#" class="btn btn-success btn-lg" data-toggle="modal" data-target="#form_expenses">Record</a>
              <a href="review_expenses.php" class="btn btn-warning btn-lg">Review</a>
            </div>
          </div>
        </div>
      </div>
<div class="row" style="margin-top: 10px">
        
      
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><b>Sales Report</b></h5>
              <p class="card-text">Generate and Print sales report</p>
              <a href="#" class="btn btn-success btn-lg" data-toggle="modal" data-target="#form_sales">Daily</a> 
              <a href="#" class="btn btn-warning btn-lg">Monthly</a>
            </div>
          </div>
        </div>
      </div>

    </div>
    
  </div>
  
</div>

</body>
</html>









<!-- adding template files which contain modal contents -->
<?php include_once("templates/product.php");   ?>
<?php include_once("templates/category.php");   ?>
<?php include_once("templates/brand.php");   ?>
<?php include_once("templates/expenses.php");   ?>
<?php include_once("templates/sales.php");   ?>
<?php include_once("templates/manage_products.php") ?>



<script type="text/javascript">
  $(document).ready(function(){
    
    // $("#updateProductForm").on("submit", function(){
    //  //   $("#updateProduct").click(function(){
      
    //   if ($('#item_desc').val() == "") {
    //     $("#item_desc_error").text("Can't be empty");
    //     $("#item_desc").css('border-color', '#cc0000');
    //     $("#item_desc").css('color', '#cc0000');
    //   }
    //   else{
    //     //alert('fffffffff');
        

    //     var item_desc = $("#item_desc").val();
    //     var qty_left = $("#qty_left").val();
    //     var cost_price = $("#cost_price").val();
    //     var selling_price = $("#selling_price").val();

    //     //var form_data = [item_desc, qty_left];
    //     var form_data = $('#updateProductForm').serialize();
       
    //     

    // });

$('#updateProduct').on('click', function(){    
    $('#updateProductForm').submit(function(e){
               e.preventDefault();
        if ($('#item_desc').val() == "") {
          $("#item_desc_error").text("Can't be empty");
           $("#item_desc").css('border-color', '#cc0000');
           //$("#item_desc").css('color', '#cc0000');
         }
         else{       
               var form_data = $('#updateProductForm').serialize();
              if (confirm("Are you sure you want to update this?")) {
                  //alert('update key');
                  $.ajax({
                    url: "includes/process.php",
                    method: "POST",
                    data: form_data,
                    success: function(data){
                      //reset form once update action is successful
                      //$('form').trigger('reset');
                      if (alert("You have successfully updated this product details")){
                        window.location.href = "dashboard.php";
                      }
                      else{
                        //alert('why alert');
                        window.location.href = "dashboard.php";
                    }
                      }
                  });
              }
              else{
                //$('form').trigger('reset');
                window.location.href = "dashboard.php";
             }
            }
        });       
  });



$('#deleteProduct').on('click', function(){
      
       $('#updateProductForm').submit(function(e){
               e.preventDefault();
          if ($('#item_desc').val() == "") {
          $("#item_desc_error").text("Can't be empty");
           $("#item_desc").css('border-color', '#cc0000');
           //$("#item_desc").css('color', '#cc0000');
         }
         else{

               var form_data = $('#updateProductForm').serialize();
               var item_desc = $("#item_desc").val();
               //alert(form_data);
             if (confirm("Are you sure you want to delete this?")) {  
             //alert('delete key'); 
                $.ajax({
                  url: "includes/process.php",
                  method: "POST",
                  data: {name: item_desc},
                  success: function(data){
                    //reset form once delete action is successful
                    //$('form').trigger('reset');
                      
                     if(alert("You have successfully deleted this product details")){
                        window.location.href = "dashboard.php";
                     }else{
                      window.location.href = "dashboard.php";
                     }
                  
                  }
                });
            }  else{
              $('form').trigger('reset');
            } 
          }  
        });
});



    
  })
</script>