

<!DOCTYPE html>
<html>
<head>
	<title>New Sale</title>
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


<div class="container">
	<form id="new_sale" onsubmit="return false">
		<div class="row" >
			<div class="col-md-6 form-group">
				<label for="Customer Name"> Customer Name:</label>
				<input type="text" name="customer_name" id="customer_name" class="form-control ">
			</div>
			<div class="col-md-3 offset-md-3 form-group">
				<label for="Date"> Date</label>					
				<input type="text" id="date" name="date" class="form-control">
			</div>	
						<div class="table-responsive" style="margin-top: 20px;">
				<table class="table table-striped table-bordered" id="sale_table" name="sale_table">
					<tr>
						<th>Item Desc.</th>
						<th>Cost Price</th>
						<th>Selling Price</th>
						<th>Qty</th>
						<th>Amount</th>
						<th>Action</th>
					</tr>
					
				</table>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" name="save_sale" id="save_sale" value="Save Sale Record">
			</div>
		</div>
	</form>	



	<div class="offset-md-10">
		<button class="btn btn-success btn-lg" name="add" id="add" data-toggle="modal" data-target="#exampleModal"> Add </button>
	</div>

</div>
	

<!-- MODAL FOR ADDING BOUGHT ITEMS -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">BUY NEW ITEM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <div class="form-group">
             <input type="hidden" class="form-control" id="hidden_row_id" name="hidden_row_id">
          </div>       
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Item Description:</label>
            <input type="text" class="form-control" id="item_desc" name="item_desc">
            <small id="item_desc_error" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Qty Left</label>
            <input type="text" class="form-control" id="qty_left" name="qty_left" readonly>
            <small id="qty_left_error" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Cost Price</label>
            <input type="text"  class="form-control" id="cost_price" name="cost_price" readonly>
            <small id="selling_price_error" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Selling Price</label>
            <input type="text"  class="form-control" id="selling_price" name="selling_price">
            <small id="cost_price_error" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Qty to buy</label>
            <input type="text" class="form-control" id="qty" name="qty">
            <small id="qty_error" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Amount</label>
            <input type="text" class="form-control" id="amount" name="amount" readonly>
            <small id="amount_error" class="form-text text-muted"></small>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="save_item" name="sale_item" value=''>Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>	
</body>
</html>




