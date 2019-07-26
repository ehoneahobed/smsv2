
<!-- Modal -->
<div class="modal fade" id="form_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="product_form" onsubmit="return false">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Date</label>
              <input type="text" class="form-control" name="added_date" id="added_date" value="<?php echo date("Y-m-d"); ?>" readonly/>
            </div>
            <div class="form-group col-md-12">
              <label>Product Name</label>
              <input type="text" class="form-control" name="product_desc" id="product_desc" placeholder="Enter Product Name" required>
            </div>
          </div>
         <div class="form-group row col-md-12" >
          <div class="col-md-6">
            <label>Cost Price</label>
            <input type="text" class="form-control" id="cost_price" name="cost_price" placeholder="Enter Cost Price" required/>
          </div>

           <div class="col-md-6">
            <label>Selling Price</label>
            <input type="text" class="form-control" id="selling_price" name="selling_price" placeholder="Enter Selling Price" required/>
          </div>
        </div>

          <div class="form-group">
            <label>Quantity</label>
            <input type="text" class="form-control" id="qty" name="qty" placeholder="Enter Quantity" required/>
          </div>
          <button type="submit" id="add_product" class="btn btn-success">Add Product</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function(){
    // for product modal to add new products to database
  $("#product_form").on("submit",function(){
      var form_data = $(this).serialize();
       //alert(form_data);
        $.ajax({
          url: "includes/process.php",
          method: "POST",
          data: form_data,
          success: function(data){
            $("#product_form").trigger("reset");
            alert(data);
            //window.location.href = "../smsnew/dashboard.php";
          }
        });
        
    })

})

</script>