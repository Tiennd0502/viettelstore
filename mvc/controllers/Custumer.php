<?php 
	class Custumer extends Controller{
		public $breadcrumb = "Bảng điều khiển";
		public $admin_navbar = "admin_navbar";
		public $title = "Khách hàng";
		public $path  = "Custumer";
		public $current = "Custumer";

		public $CustumerModel;

		public function __construct(){
			$this->CustumerModel = $this->model("CustumerModel");
		}
		public function Index(){
			if (isset($_SESSION["admin"])) {
				$custumers = $this->CustumerModel->AllCustumers();
				$this-> view( "admin", [
											"Admin_navbar" => $this->admin_navbar,
											"Current" => $this->current,
			  							"Page" => "custumer_list",
			  							"Page_title"=>"admin_header", 
			  							"Title" => $this->title,
		  								"Breadcrumb" => $this->breadcrumb,
		  								"Custumers" => $custumers,
										]);
			}else {
				echo '<h3> Vui lòng <a href="admin" >đăng nhập</a> trước khi sử dụng chức năng</h3>';
				exit;
			}
			
		}

		public function InsertCustumer(){
			
		}

		public function DeleteCustumer($id){
			if (isset($_SESSION["admin"])) {
				$custumers = $this->CustumerModel->AllCustumers();
				$result = $this->CustumerModel->DeleteCustumer($id);
				$this-> view( "admin", [
											"Admin_navbar" => $this->admin_navbar,
											"Current" => $this->current,
			  							"Page" => "custumer_list",
			  							"Page_title"=>"admin_header", 
			  							"Title" => $this->title,
		  								"Breadcrumb" => $this->breadcrumb,
		  								"Custumers" => $custumers,
		  								"Result" => $result,
										]);
			}else {
				echo '<h3> Vui lòng <a href="admin" >đăng nhập</a> trước khi sử dụng chức năng</h3>';
				exit;
			}
		}
	}
?>