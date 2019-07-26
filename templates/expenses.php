<!-- Modal -->
<div class="modal fade" id="form_expenses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="expenses_form" onsubmit="return false">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Date</label>
              <input type="text" class="form-control" name="added_date" id="added_date" value="<?php echo date('m/d/Y'); ?>" />
            </div>
            <div class="form-group col-md-12">
              <label>Description of Expenses</label>
              <textarea type="text" class="form-control" name="expenses_desc" id="expenses_desc" placeholder="Describe the expenses made" required></textarea> 
              <small id="item_desc_error" class="form-text text-muted"></small>
            </div>
          </div>
         

           <div class="form-group col-md-12">
            <label>Total Cost</label>
            <input type="text" class="form-control" id="total_cost" name="total_cost" placeholder="Total cost here" required/>
          </div>
                  
          
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-success" id="record_expenses" name="record_expenses">Record Expenses  </button>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>


<script type="text/javascript">
  $(document).ready(function(){
    $('#record_expenses').on("click", function(){
          $('#expenses_form').submit(function(e){
              e.preventDefault();
                            
               if ($('#expenses_desc').val() == "") {
                 $("#item_desc_error").text("Can't be empty");
                 $("#expenses_desc").css('border-color', '#cc0000');
                 //$("#item_desc_error").css('color', '#cc0000');
               }
              else{
                var form_data = $('#expenses_form').serialize();
                //alert(form_data);
                $.ajax({
                  url: "includes/process.php",
                  method: "POST",
                  data: form_data,
                  success: function(data){
                    //reset form once delete action is successful
                    //$('form').trigger('reset');
                      
                     alert(form_data);                  
                  }
                });

              }
                   
           });

        });
  })
</script>

