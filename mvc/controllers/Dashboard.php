<?php 
	
	class Dashboard extends Controller{

		public $breadcrumb   = "Bảng điều khiển";
		public $admin_navbar = "admin_navbar";
		public $current      = "Category";

		public $CategoryModel;
		public function __construct(){
			// $this->CategoryModel = $this->model("CategoryModel");
		}

		public function Index(){

			if (isset($_SESSION["admin"])) {
				// $list = $this->CategoryModel->AllCategorys();
				$this->view("admin",[
			  							"Page" => "dashboard",
			  						]);
			}else {
	  		echo '<h3> Vui lòng <a href="admin" >đăng nhập</a> trước khi sử dụng chức năng</h3>';
	  		exit;
	  	}
		}
		public function AddCategory(){

			if(isset($_POST['addCategory'])){
				$data              = array();
				$data["name"]      = $_POST["name"];
				$data["slug"]      = $_POST["slug"];
				$data["icon"]      = $_POST["icon"];
				$data["title"]      = $_POST["title"];
		  	// Insert vào bảng
		  	$result =$this->CategoryModel->InsertCategory($data);		
				$this->view("admin_page",[
			  							"Admin_navbar" => $this->admin_navbar,
			  							"Current"		=> $this->current,
			  							"Page" => "add_category",
			  							"Page_title"=>"admin_page_header", 
			  							"Title" => "Loại hàng",
		  								"Breadcrumb" => $this->breadcrumb,
		  								"Result" => $result
			  						]);
			}else {
				$this->view("admin_page",[
			  							"Admin_navbar" => $this->admin_navbar,
			  							"Current"		=> $this->current,
			  							"Page" => "add_category",
			  							"Page_title"=>"admin_page_header", 
			  							"Title" => "Loại hàng",
		  								"Breadcrumb" => $this->breadcrumb,
			  						]);
			}
		}

		public function EditCategory($id){
			if(isset($_POST["updateCategory"])){
				$data              = array();
				$data["id"]				 = $_POST["id"];
				$data["name"]      = $_POST["name"];
				$data["slug"]      = $_POST["slug"];
				$data["icon"]      = $_POST["icon"];
				$data["title"]      = $_POST["title"];
	  		$result = $this->CategoryModel ->UpdateCategory($data);
	  		if($result == "true"){
	  			$list = $this->CategoryModel->AllCategorys();
					$this->view("admin_page",[
				  							"Admin_navbar" => $this->admin_navbar,
				  							"Current"		=> $this->current,
				  							"Page" => "admin_category",
				  							"Page_title"=>"admin_page_header", 
				  							"Title" => "Loại hàng",
			  								"Breadcrumb" => $this->breadcrumb,
			  								"ListCategory" => $list,
			  								"Result" => $result,
				  						]);
	  		}else {
	  			$item = $this->CategoryModel ->GetOneCategory($id);
	  			$this->view("admin_page",[
			  							"Admin_navbar" => $this->admin_navbar,
			  							"Current"		=> $this->current,
			  							"Page" => "add_category",
			  							"Page_title"=>"admin_page_header", 
			  							"Title" => "Loại hàng",
		  								"Breadcrumb" => $this->breadcrumb,
		  								"Item" => $item,
		  								"Result" => $result,
			  						]);
	  		}
	  	}else {
	  		$item = $this->CategoryModel ->GetOneCategory($id);
	  		$this->view("admin_page",[
			  							"Admin_navbar" => $this->admin_navbar,
			  							"Current"		=> $this->current,
			  							"Page" => "add_category",
			  							"Page_title"=>"admin_page_header", 
			  							"Title" => "Loại hàng",
		  								"Breadcrumb" => $this->breadcrumb,
		  								"Item" => $item
			  						]);
	  	}
		}

		public function DeleteCategory($id){
			$result = $this->CategoryModel ->DeleteCategory($id);
			$list = $this->CategoryModel->AllCategorys();
			$this->view("admin_page",[
				  							"Admin_navbar" => $this->admin_navbar,
				  							"Current"		=> $this->current,
				  							"Page" => "admin_category",
				  							"Page_title"=>"admin_page_header", 
				  							"Title" => "Loại hàng",
			  								"Breadcrumb" => $this->breadcrumb,
			  								"ListCategory" => $list,
			  								"Result" => $result,
			  								"Delete" => ""
				  						]);
		}
	}

 ?>