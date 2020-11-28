<?php 
 
	class Order extends Controller{
		public $breadcrumb = "Bảng điều khiển";
		public $admin_navbar = "admin_navbar";
		public $title = "Đơn hàng";
		public $path  = "Order";
		public $current = "Order";

		public $OrderModel;

		public function __construct(){
			$this->OrderModel = $this->model("OrderModel");
		}

		public function Index(){
    	if (isset($_SESSION["admin"])) {
				$orders = $this->OrderModel->AllOrders();
				$this-> view( "admin", [
											"Admin_navbar" => $this->admin_navbar,
											"Current" => $this->current,
			  							"Page" => "order_list",
			  							"Page_title"=>"admin_header", 
			  							"Title" => $this->title,
		  								"Breadcrumb" => $this->breadcrumb,
		  								"Orders" => $orders,
										]);
			}else {
				echo '<h3> Vui lòng <a href="admin" >đăng nhập</a> trước khi sử dụng chức năng</h3>';
				exit;
			}
 		}

 		public function Detail($id){
 			if (isset($_SESSION["admin"])) {
				$order = $this->OrderModel->OrderDetail($id);
				$this-> view( "admin", [
											"Admin_navbar" => $this->admin_navbar,
											"Current" => $this->current,
			  							"Page" => "order_detail",
			  							"Page_title"=>"admin_header", 
			  							"Path"	=> $this->path,
			  							"Title" => $this->title,
			  							"Current_title" => "Đơn hàng chi tiết",
		  								"Breadcrumb" => $this->breadcrumb,
		  								"Order" => $order,
										]);
			}else {
				echo '<h3> Vui lòng <a href="admin" >đăng nhập</a> trước khi sử dụng chức năng</h3>';
				exit;
			}
 		}
 			
 		public function DeleteOrder($id){
 			if (isset($_SESSION["admin"])) {
				$result = $this->OrderModel->DeleteOrder($id);
				$orders = $this->OrderModel->AllOrders();
				$this-> view( "admin", [
											"Admin_navbar" => $this->admin_navbar,
											"Current" => $this->current,
			  							"Page" => "order_list",
			  							"Page_title"=>"admin_header", 
			  							"Title" => $this->title,
		  								"Breadcrumb" => $this->breadcrumb,
		  								"Orders" => $orders,
		  								"Result" => $result,
										]);
			}else {
				echo '<h3> Vui lòng <a href="admin" >đăng nhập</a> trước khi sử dụng chức năng</h3>';
				exit;
			}
 		}
 	} 
 ?>		
