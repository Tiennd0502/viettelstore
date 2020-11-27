<?php 
	
	class Trademark extends Controller{

		public $breadcrumb = "Bảng điều khiển";
		public $admin_navbar = "admin_navbar";
		public $title = "Thương hiệu";
		public $path  = "Trademark";
		public $current = "Trademark";

		public $CategoryModel;
		public $TrademarkModel;
		public function __construct(){
			$this->CategoryModel = $this->model("CategoryModel");
			$this->TrademarkModel = $this->model("TrademarkModel");
		}

		public function Index(){
			if (isset($_SESSION["admin"])) {
				$category = $this->CategoryModel->AllCategorys();
				$trademark = $this->TrademarkModel->AllTrademarks();

				$this->view("admin",[
			  							"Admin_navbar" => $this->admin_navbar,
			  							"Current" => $this->current,
			  							"Page" => "trademark_list",
			  							"Page_title"=>"admin_header", 
			  							"Title" => $this ->title,
		  								"Breadcrumb" => $this->breadcrumb,
		  								"Categorys" => $category,
		  								"Trademarks" => $trademark
			  						]);
			}else {
	  		echo '<h3> Vui lòng <a href="admin" >đăng nhập</a> trước khi sử dụng chức năng</h3>';
	  		exit;
	  	}
		}
		public function AddTrademark(){
			if (isset($_SESSION["admin"])) {
				$categorys = $this->CategoryModel->AllCategorys();

				if(isset($_POST['addTrademark'])){
					$data                = array();
					$data["category_id"] = $_POST["category_id"];
					$data["name"]        = $_POST["name"];
					$data["image"]       = $_FILES["image"];
					
			  	// Insert vào bảng
			  	$result =$this->TrademarkModel->InsertTrademark($data);		
					$this->view("admin",[
			  							"Admin_navbar" => $this->admin_navbar,
			  							"Current" => $this->current,
			  							"Page" => "trademark_add",
			  							"Page_title"=>"admin_header", 
			  							"Title" => $this ->title,
			  							"Path"	=> $this->path,
		  								"Breadcrumb" => $this->breadcrumb,
		  								"Categorys" => $categorys,
		  								"Result" => $result
				  					]);
				}else {
					$this->view("admin",[
			  							"Admin_navbar" => $this->admin_navbar,
			  							"Current" => $this->current,
			  							"Page" => "trademark_add",
			  							"Page_title"=>"admin_header", 
			  							"Title" => $this ->title,
			  							"Path"	=> $this->path,
		  								"Breadcrumb" => $this->breadcrumb,
		  								"Categorys" => $categorys,
				  					]);
				}
			}else {
	  		echo '<h3> Vui lòng <a href="admin" >đăng nhập</a> trước khi sử dụng chức năng</h3>';
	  		exit;
	  	}
		}

		public function EditTrademark($id){
			if (isset($_SESSION["admin"])) {
				$categorys = $this->CategoryModel->AllCategorys();
				if(isset($_POST["updateTrademark"])){
					$data                = array();
					$data["id"]          = $_POST["id"];
					$data["category_id"] = $_POST["category_id"];
					$data["name"]        = $_POST["name"];
					$data["path"]        = $_POST["path"];
					$data["image"]       = $_FILES["image"];

		  		$result = $this->TrademarkModel ->UpdateTrademark($data);
		  		if($result == "true"){

						$this->view("admin",[
				  							"Admin_navbar" => $this->admin_navbar,
				  							"Current" => $this->current,
				  							"Page" => "trademark_list",
				  							"Page_title"=>"admin_header", 
				  							"Title" => $this ->title,
			  								"Breadcrumb" => $this->breadcrumb,
			  								"Categorys" => $categorys,
			  								"Result" => $result,
			  								"Trademarks" => $this->TrademarkModel ->AllTrademarks(),
				  						]);
		  		}else {
		  			$item = $this->CategoryModel ->GetOneCategory($id);
		  			$this->view("admin",[
				  							"Admin_navbar" => $this->admin_navbar,
				  							"Current" => $this->current,
				  							"Page" => "trademark_add",
				  							"Page_title"=>"admin_header", 
				  							"Title" => $this->title,
			  								"Breadcrumb" => $this->breadcrumb,
			  								"Categorys" => $categorys,
			  								"Item" => $item,
			  								"Result" => $result,
				  						]);
		  		}
		  	}else {
		  		$item = $this->TrademarkModel ->GetOneTrademark($id);
		  		$this->view("admin",[
				  							"Admin_navbar" => $this->admin_navbar,
				  							"Current" => $this->current,
				  							"Page" => "trademark_add",
				  							"Page_title"=>"admin_header", 
				  							"Title" => $this->title,
				  							"Path"	=> $this->path,
			  								"Breadcrumb" => $this->breadcrumb,
			  								"Categorys" => $categorys,
			  								"Item" => $item
				  						]);
		  	}
	  	}else {
	  		echo '<h3> Vui lòng <a href="admin" >đăng nhập</a> trước khi sử dụng chức năng</h3>';
	  		exit;
	  	}
		}

		public function DeleteTrademark($id){
			if (isset($_SESSION["admin"])) {
				$result = $this->TrademarkModel ->DeleteTrademark($id);
				$categorys = $this->CategoryModel->AllCategorys();
				$trademarks = $this->TrademarkModel ->AllTrademarks();
				$this->view("admin",[
					  							"Admin_navbar" => $this->admin_navbar,
					  							"Current" => $this->current,
					  							"Page" => "trademark_list",
					  							"Page_title"=>"admin_header", 
					  							"Title" => $this->title,
				  								"Breadcrumb" => $this->breadcrumb,
				  								"Categorys" => $categorys,
				  								"Trademarks" => $trademarks,
				  								"Result" => $result,
				  								"Delete" => ""
					  						]);
				}else {
	  		echo '<h3> Vui lòng <a href="admin" >đăng nhập</a> trước khi sử dụng chức năng</h3>';
	  		exit;
	  	}
		}
	}

 ?>