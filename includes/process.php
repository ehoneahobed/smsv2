<?php

include_once("../database/constants.php");
include_once("DBOperation.php");

$obj = new DBOperation();

// recording expenses
if (isset($_POST['expenses_desc'])) {
	$date = $_POST['added_date'];
	$expenses_desc = $_POST['expenses_desc'];
	$total_cost = $_POST['total_cost'];
	$obj->recordExpenses($date, $expenses_desc, $total_cost);
}

// reviewing expenses
if (isset($_POST['fromDate']) && isset($_POST['toDate'])) {
	$fromDate = $_POST['fromDate'];
	$toDate = $_POST['toDate'];
	//echo $toDate;
	$obj->reviewExpenses($fromDate, $toDate);
}


// deleting selected product
if (isset($_POST['name'])) {
	$name = $_POST['name'];
	$obj->deleteProduct($name);
}

// updating product details
if (isset($_POST['item_desc'])) {
	//print_r($_POST);
	$item_desc = $_POST['item_desc'];
	$cost_price = $_POST['cost_price'];
	$selling_price = $_POST['selling_price'];
	$qty = $_POST['qty_left'];
	$obj->updateProduct($item_desc, $cost_price, $selling_price, $qty);
}

// selecting all products for product management


// adding new products to database
if (isset($_POST['product_desc']) && isset($_POST['added_date'])) {
	$item_desc = $_POST['product_desc'];
	$cost_price = $_POST['cost_price'];
	$selling_price = $_POST['selling_price'];
	$qty = $_POST['qty'];
	$added_date = $_POST['added_date'];

	echo $obj->addProducts($item_desc, $cost_price, $selling_price, $qty, $added_date );
}

// Processing customer details for invoice
if (isset($_POST['customer_name']) && !empty($_POST['customer_name'])) {
	$customer_name = $_POST['customer_name'];
	$date = $_POST['date'];
	$total_amount = '8888';
	$inv_no = '444';
	echo $_POST['date'];
	//$obj = new DBOperation();
	$inv_id = $obj->insertInvoice($inv_no, $customer_name, $total_amount, $date);

	// Processing inserting sales data

if ($inv_id) {
	
	for ($count=0; $count < count($_POST['hidden_item_desc']) ; $count++) { 
			$data = array(
				'item_desc' => $_POST['hidden_item_desc'][$count] ,
				'cost_price'=>$_POST['hidden_cost_price'][$count],
				'selling_price' => $_POST['hidden_selling_price'][$count] ,
				'qty' => $_POST['hidden_qty'][$count] ,
				'qty_left' => $_POST['hidden_selling_price'][$count] - $_POST['hidden_qty'][$count] ,
				'amount' => $_POST['hidden_amount'][$count] , 
			);

			//$obj = new DBOperation();
			$result = $obj->insertSales($data, $inv_id);	
			$quantity_update = $obj->updateQuantity($data['item_desc'], $data['qty']);
		}
	}
}

// using the single autocomplete to select product list from database
/*	
	$search_term = '%'.$_GET['term'].'%' ;
	$obj->selectProducts($search_term);
*/

// using multiple autocomplete to select product list from database 

	if(@$_GET['type'] == 'products'){
		$search_term = '%'.$_GET['name_startsWith'].'%' ;
		$obj->selectProducts($search_term);
	} else{
		//echo "Something went wrong";
}


// end of multiple autocomplete select products

?>