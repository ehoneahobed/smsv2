
<!-- MODAL FOR MANAGING PRODUCTS -->
<div class="modal fade" id="updateProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Manage Products</h5>
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
            <input type="text" class="form-control" id="qty_left" name="qty_left">
            <small id="qty_left_error" class="form-text text-muted"></small>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="message-text" class="col-form-label">Cost Price</label>
              <input type="text"  class="form-control" id="cost_price" name="cost_price">
              <small id="selling_price_error" class="form-text text-muted"></small>
            </div>
            <div class="col-md-6">
              <label for="message-text" class="col-form-label">Selling Price</label>
              <input type="text"  class="form-control" id="selling_price" name="selling_price">
              <small id="cost_price_error" class="form-text text-muted"></small>
            </div>
          </div>

          
       
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="save_item" name="sale_item" value=''>Update</button>
        <button type="submit" class="btn btn-danger" id="save_item" name="sale_item" value=''>Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>	

