<?php

include_once("../database/constants.php");
include_once("DBOperation.php");

$obj = new DBOperation();

// selecting all products for product management

$stmt = $obj->selectAllProducts();
while($row = $stmt->fetch_assoc()){	
			$id = $row['id'];
			$item_desc = $row['item_desc'];
			$cost_price = $row['cost_price'];
			$selling_price = $row['selling_price'];
			$qty = $row['qty'];
			$added_date = $row['added_date'];

			$name = array($id, $item_desc, $cost_price, $selling_price, $qty, $added_date);
			//print_r($name);
			//$data =array();
			//array_push($data, $name);
			//print_r( $data_result);
			//return json_encode($data);

			}
			echo json_encode($name);



?>