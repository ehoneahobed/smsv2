$(document).ready(function(){
		
		var count = 0;
	//resetting inputs to empty at the click of the button 'add'	
		$('#add').click(function(){
			$('#exampleModalLabel').text('BUY NEW ITEM');
			$("#item_desc").val('');
			$("#qty_left").val('');
			$("#cost_price").val('');
			$("#selling_price").val('');
			$("#qty").val('');
			$("#amount").val('');


		})

		$("#save_item").click(function(){
			var item_desc = $("#item_desc").val();
			var qty_left = $("#qty_left").val();
			var cost_price = $("#cost_price").val();
			var selling_price = $("#selling_price").val();
			var qty = $("#qty").val();
			var amount = $("#amount").val();

			
			
			if (item_desc == "") {
				$("#item_desc_error").text("Can't be empty");
				$("#item_desc").css('border-color', '#cc0000');

			}
			else
				{
				if($("#save_item").text() == "Save")
				{
					count = count + 1;
					output = "<tr id='row_"+count+"'>";
					output +="<td>"+item_desc+"<input type='hidden' class='form-control item_desc' id='item_desc"+count+"' name='hidden_item_desc[]' value='"+item_desc+"'> </td>"; 
					output +="<td>"+cost_price+"<input type='hidden' class='form-control' id='cost_price"+count+"' name='hidden_cost_price[]' value='"+cost_price+"'> </td>";
					output +="<td>"+selling_price+"<input type='hidden' class='form-control' id='selling_price"+count+"' name='hidden_selling_price[]' value='"+selling_price+"'> </td>"; 
					output +="<td>"+qty+"<input type='hidden' class='form-control' id='qty"+count+"' name='hidden_qty[]' value='"+qty+"'> </td>"; 
					output +="<td>"+amount+"<input type='hidden' class='form-control' id='amount"+count+"' name='hidden_amount[]' value='"+amount+"'> </td>"; 
					output +="<td><button type='button' class='btn btn-warning edit_details' id='"+count+"'>Edit </button>"
					+ " <button type='button' class='btn btn-danger remove_details' id='"+count+"'>Remove </button></td>"; 
					output += "</tr>";
					$("#sale_table").append(output);
				} else{
					
					var row_id = $('#hidden_row_id').val();
					
					output ="<td>"+item_desc+"<input type='hidden' class='form-control item_desc' id='item_desc"+row_id+"' name='hidden_item_desc[]' value='"+item_desc+"'> </td>"; 
					output +="<td>"+cost_price+"<input type='hidden' class='form-control' id='cost_price"+count+"' name='hidden_cost_price[]' value='"+cost_price+"'> </td>";
					output +="<td>"+selling_price+"<input type='hidden' class='form-control' id='selling_price"+row_id+"' name='hidden_selling_price[]' value='"+selling_price+"'> </td>"; 
					output +="<td>"+qty+"<input type='hidden' class='form-control' id='qty"+row_id+"' name='hidden_qty[]' value='"+qty+"'> </td>"; 
					output +="<td>"+amount+"<input type='hidden' class='form-control' id='amount"+row_id+"' name='hidden_amount[]' value='"+amount+"'> </td>"; 
					output +="<td><button type='button' class='btn btn-warning edit_details' id='"+row_id+"'>Edit </button>"
					+ " <button type='button' class='btn btn-danger remove_details' id='"+row_id+"'>Remove </button></td>"; 
					//$('#row_'+row_id+'').parent().replaceWith(output);
					
					$('#row_'+row_id).html(output);
					
										
					$("#save_item").text('Save');
					
				}	

					$("#exampleModal").modal('hide');	
				}

			
			
		});

		// code to edit details in table
		$(document).on('click', '.edit_details', function(){
			var row_id = $(this).attr("id");
			var item_desc = $("#item_desc"+row_id+'').val();
			var qty_left = $("#qty_left"+row_id+'').val();
			var cost_price = $("#cost_price"+row_id+'').val();
			var selling_price = $("#selling_price"+row_id+'').val();
			var qty = $("#qty"+row_id+'').val();
			var amount = $("#amount"+row_id+'').val();
			

			$('#save_item').text('Edit');
			$('#hidden_row_id').val(row_id);
			$('#item_desc').val(item_desc);
			$('#qty_left').val(qty_left);
			$('#cost_price').val(cost_price);
			$('#selling_price').val(selling_price);
			$('#qty').val(qty);
			$('#amount').val(amount);
			$('#exampleModalLabel').text('Edit Details');
			$("#exampleModal").modal('show');
		});




		$(document).on('click', '.remove_details', function(){
			var row_id = $(this).attr("id");
			if (confirm("Are you sure you want to delete this?")) {
				$('#row_'+row_id+'').remove();
			} else{
				return false;
			}
		});


		

})


	$(document).ready(function(){
		$("#new_sale").on("submit",function(){

				//alert($('#new_sale').html());
	/*
				var count_data = $('.item_desc').length;			
				if (count_data > 0) {
					alert(count_data);
				}
				else{
					alert('Add at least one item before saving');
				}
	*/
				// checking if an item has been added before saving
				var count_data = 0;
				$('.item_desc').each(function(){
					count_data = count_data + 1;
				});
				if (count_data > 0) {
					var form_data = $(this).serialize();
					$.ajax({
						url: "includes/process.php",
						method: "POST",
						data: form_data,
						success: function(data){
							//alert(data);
							window.location.href = "../smsnew/newsale.php";
						}
					});
				}
				else{
					alert('Add at least one item before saving');
				}
		
		});

	$('#qty').keyup(function(){
		$total_amount = $('#qty').val() * $('#selling_price').val();
		$('#amount').val($total_amount);
	});


	// for a single jquery autocomplete
/*	$('#item_desc').autocomplete({
			source: 'includes/process.php'
		});

*/
	// for multiple values autocomplete
	$('#item_desc').autocomplete({
			      	source: function( request, response ) {
			      		$.ajax({
			      			url : 'includes/process.php',
			      			dataType: "json",
							data: {
							   name_startsWith: request.term,
							   type: 'products',
							},
							 success: function( data ) {
								 response( $.map( data, function( item ) {
								 	var code = item.split("|");
									return {
										label: code[0],
										value: code[0],
										data : item
									}
								}));
							}
			      		});
			      	},
			      	autoFocus: true,	      	
			      	minLength: 0,
			      	select: function( event, ui ) {
						var names = ui.item.data.split("|");
						console.log(names[1], names[2], names[3]);						
						$('#selling_price').val(names[1]);
						$('#qty_left').val(names[2]);
						$('#cost_price').val(names[3]);
					}		      	
			      });
	
//end of multiple value autocomplete

	// date picker 
	$('#date').datepicker();

	$('.date').datepicker();

})




