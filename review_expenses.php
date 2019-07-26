 <?php


?>

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

  <div class="container dashboard-container" style="">
    <div class="row">
       <div class="col-md-12 jumbotron">
          <div class="row">
            <div class="col-md-8 offset-md-2">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"><b>REVIEW EXPENSES</b></h5>
                    <form id='reviewExpenseForm' onsubmit="return false">
                      <div class="card-text">
                        <div class="form-group row">
                          <div class="col-md-6">
                            <label>From</label>
                            <input type="text" class="form-control date" name="fromDate" id="fromDate">
                          </div>
                          <div class="col-md-6">
                            <label>To</label>
                            <input type="text" class="form-control date" name="toDate" id="toDate">
                          </div>
                        </div>
                        <div class="form-group">
                          <input type="submit" class="btn btn-success btn-lg col-md-12" name="reviewExpenses" id="reviewExpenses" value="Review Expenses Made Over this Period">
                        </div>
                      </div>
                      
                    </form>

                </div>
              </div>
            </div>
          </div>
       </div>
    </div>


</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    // show date in input boxes
    $('.date').datepicker();

    // collect form data and send to processing page
    $('#reviewExpenses').on("click", function(){
      $('#reviewExpenseForm').submit(function(){
        var form_data = $('#reviewExpenseForm').serialize();
        $.ajax({
          url: 'includes/process.php',
          method: 'POST',
          data: form_data,
          success:function(msg){
           // return data;
           // var result1 = JSON.parse('<?php //echo json_encode(result) ?>');
           // alert(result1);
           alert(msg);

          }
        });
      });
    });
  })
</script>