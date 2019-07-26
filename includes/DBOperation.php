<?php
/**
* 
*/
class DBOperation
{
	
	private $con;
	public $inv_id;

	function __construct()
	{
		include_once("../database/db.php");
		$db = new Database();
		$this->con = $db->connect();
	}
	// deleting the selected product
	public function deleteProduct($name){
		$query = "DELETE FROM `products` WHERE `item_desc`=? ";
		$pre_stmt = $this->con->prepare($query);
		$pre_stmt->bind_param("s", $name); 
		$pre_stmt->execute() or die($this->con->error);
		$stmt = $pre_stmt->get_result(); 
	}

	// saving record of expenses
	public function recordExpenses($date, $expenses_desc, $total_cost){
		$query = " INSERT INTO `expenses`( `date`, `expenses_desc`, `total_cost`) VALUES (?,?,?)";
		$pre_stmt = $this->con->prepare($query);
		$pre_stmt->bind_param("sss", $date, $expenses_desc, $total_cost); 
		$pre_stmt->execute() or die($this->con->error);
		$stmt = $pre_stmt->get_result(); 
	}

	// reviewing already saved expenses
	public function reviewExpenses($fromDate, $toDate){
		$query = "SELECT * FROM `expenses` WHERE `date` BETWEEN ? AND ?";
		$pre_stmt = $this->con->prepare($query);
		$pre_stmt->bind_param("ss", $fromDate, $toDate); 
		$pre_stmt->execute() or die($this->con->error);
		$stmt = $pre_stmt->get_result(); 
		//print_r($stmt);

		
		 $row = $stmt->fetch_all(MYSQLI_ASSOC);
		$result = array();
		//print_r($row);
		//echo $num = count($row);
		$r =$row;
		print_r($r);
		$result = array();
		array_push($result,$r);
		echo json_encode($result);
				
	}

	// updating selected product details
	public function updateProduct($item_desc, $cost_price, $selling_price, $qty){
		$query = "UPDATE `products` SET `cost_price`=?,`selling_price`=?,`qty`=? WHERE `item_desc`=? ";
		$pre_stmt = $this->con->prepare($query);
		$pre_stmt->bind_param("ssis", $cost_price, $selling_price, $qty, $item_desc); 
		$pre_stmt->execute() or die($this->con->error);
		$stmt = $pre_stmt->get_result(); 
		//echo $stmt;
	}

	// selecting all products available
	public function selectAllProducts(){
		$pre_stmt = $this->con->prepare("SELECT * from `products`");
		$pre_stmt->execute() or die($this->con->error);
		$stmt = $pre_stmt->get_result();
		
		return $stmt;
			//print_r($name);	
		}

		
	

	// add new products to database
	public function addProducts($item_desc, $cost_price, $selling_price, $qty, $added_date ){

		// check to see if product already exist
		$query = "SELECT `id` FROM `products` where `item_desc` like ?";
		$pre_stmt = $this->con->prepare($query);
		$pre_stmt->bind_param("s", $item_desc); 
		$pre_stmt->execute() or die($this->con->error);
		$stmt = $pre_stmt->get_result();
		
		$row = $stmt->fetch_assoc();

		if (@count($row) > 0) {
			$result ='This item has already been saved';
			return $result;
		}else{


		$pre_stmt = $this->con->prepare("INSERT INTO `products`( `item_desc`, `cost_price`, `selling_price`, `qty`, `added_date`) 
			VALUES (?,?,?,?,?)");

		$pre_stmt->bind_param("sssis", $item_desc, $cost_price, $selling_price, $qty, $added_date	);
		$result = $pre_stmt->execute() or die($this->con->error);
		if ($result) {
			$final_result = 'You have successfully added a new product';
			return $final_result;
			}
		}
	}


	// insert data into database
	public function insertInvoice($inv_no, $customer_name, $total_amount, $date)
	{
		$pre_stmt = $this->con->prepare("INSERT INTO `invoice`(`inv_no`, `customer_name`, `total_amount`, `date`) 
			VALUES (?,?,?,?)");

		$pre_stmt->bind_param("isss", $inv_no, $customer_name, $total_amount, $date	);
		$result = $pre_stmt->execute() or die($this->con->error);
		
		//get the last id then proceed to insert sales data
		$inv_id = mysqli_insert_id($this->con);
		return $inv_id;
		//echo $inv_id;

		
		
	}


	//to insert sales data
	public function insertSales($data, $inv_id){
					//print_r($data);
				
					$item_desc = $data['item_desc'];
					$cost_price =$data['cost_price'];
					$selling_price =$data['selling_price'];
					$qty = $data['qty'];
					$qty_left = $data['qty_left'];
					$amount = $data['amount'];

					$pre_stmt = $this->con->prepare("INSERT INTO `sales`( `inv_id`, `item_desc`, `cost_price`, `selling_price`, `qty`, `amount`) 
						VALUES (?,?,?,?,?,?)");

					$pre_stmt->bind_param("isssss", $inv_id, $item_desc, $cost_price, $selling_price, $qty, $amount	);
					$result = $pre_stmt->execute() or die($this->con->error);


		}

		



	public function selectProducts($search_term){
		$query = "SELECT * FROM `products` where `item_desc` like ?";
		$pre_stmt = $this->con->prepare($query);
		$pre_stmt->bind_param("s", $search_term); 
		$pre_stmt->execute() or die($this->con->error);
		$stmt = $pre_stmt->get_result();
		
		$data = array();
		
		while ($row = $stmt->fetch_assoc()) {
		// for a single autocomplete request	
		//array_push($data, $row['item_desc']);
			

			// for multiple values autocomplete request
			
				if($row['qty']>=1){
				$name = $row['item_desc'].'|'.$row['selling_price'].'|'.$row['qty'].'|'.$row['cost_price'];
				array_push($data, $name);
				//print_r($data);
				}	else{
					$row['qty'] = 'It\'s finished';
					$name = $row['item_desc'].'|'.$row['selling_price'].'|'.$row['qty'].'|'.$row['cost_price'];
				array_push($data, $name);
				}
			//print_r($data);
			// end of multiple value autocomplete request	
			

			
			 
		}
		echo json_encode($data);
		
	}

		// updating the quantity left			
	public function updateQuantity($item_desc, $qty_left){
		// selecting item and picking it quantity to update
		$query = "SELECT `qty` FROM `products` where `item_desc` like ?";
		$pre_stmt = $this->con->prepare($query);
		$pre_stmt->bind_param("s", $item_desc); 
		$pre_stmt->execute() or die($this->con->error);
		$stmt = $pre_stmt->get_result();
		
		$row = $stmt->fetch_assoc();
		//echo $row['qty'];
		$new_qty = $row['qty']-$qty_left;

		// updating quantity now
		$query = "UPDATE `products` SET `qty`=? WHERE `item_desc` = ? ";
		$pre_stmt = $this->con->prepare($query);
		$pre_stmt->bind_param("is", $new_qty, $item_desc); 
		$pre_stmt->execute() or die($this->con->error);
		//$stmt = $pre_stmt->get_result();

	}



}		
				
		
/*
$obj = new DBOperation();
//$search_term = '%'.$_GET['term'].'%' ;
$search_term = '%t%';
	$obj->selectProducts($search_term);

*/


$obj = new DBOperation();
$obj->reviewExpenses('07/26/2019', '07/26/2019');


?>