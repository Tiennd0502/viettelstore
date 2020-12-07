<?php 
 
	class Cart extends Controller{
		public $Categorys;
		public $CategoryModel;
		public $ProductModel;
		public $OrderModel;
		public $CustumerModel;

		// public $listProduct;

		public function __construct(){
			$this->Categorys = $this->model("CategoryModel")->AllCategorys();
			$this->CategoryModel = $this->model("CategoryModel");
			$this->ProductModel = $this->model("ProductModel");
			$this->OrderModel = $this->model("OrderModel");
			$this->CustumerModel = $this->model("CustumerModel");
		}

		public function Index(){
			
    	if(!isset($_SESSION["cart"])){
    		$_SESSION["cart"] = array();
    	}
    	if(empty($_SESSION["cart"])){
    		$this->view("home",[
    								"Page" =>"cart_empty",
    								"Categorys" =>$this->Categorys,
    								]);
    	}else {
    		$this->view("home",[
    								"Page" => "cart",
    								"Categorys" =>$this->Categorys,
    								]);
    		
    	}
 		}
 		public function AddToCart($product_id){
 			if(!isset($_SESSION["cart"])){
    		$_SESSION["cart"] = array();
    	}
    	if (!isset($_SESSION["cart"][$product_id]["quantity"])) { 
				$product = $this->ProductModel->GetProductInCart($product_id);
				$_SESSION["cart"][$product_id] = json_decode($product, TRUE);
				$_SESSION["cart"][$product_id]["quantity"] = 1;
			}
 		}
 		public function UpdateQuantity(){
 			$product_id = $_POST["id"];
 			$quantity = $_POST["quantity"];
 			$_SESSION["cart"][$product_id]["quantity"] = $quantity;
 			
 		}
 		public function DeleteItemCart(){
 			$product_id = $_POST["id"];
 			unset($_SESSION["cart"][$product_id]);
 		}
 		public function Order(){
 			$data = array();
 			$data["name"] = $_POST["name"];
 			$data["phone"] = $_POST["phone"];
 			$data["gender"] = $_POST["gender"];
 			$data["address"] = $_POST["address"];
 			$data["note"] = $_POST["otherNote"];

 			$order = $this->OrderModel->AddOrder($data);
 			$checkphone = $this->CustumerModel->CkeckCustumerPhone($data["phone"]); // them sau
 			if ($checkphone == "false") {
 				$insertCustumer = $this->CustumerModel->InsertCustumer($data);
 			}//het thêm
 			if ($order == "true") {
 				unset($_SESSION['cart']);
 			}
 			echo $order;

 		}
 	} 
 ?>		
