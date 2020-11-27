<?php  
	class Admin extends Controller{

		public $breadcrumb = "Bảng điều khiển";
		public $admin_navbar = "admin_navbar";
		public $UserModel;

		public $CategoryModel;
		public function __construct(){
			$this->UserModel = $this->model("UserModel");
			// $this->CategoryModel = $this->model("CategoryModel");
		}
	  public function Index(){
	  	if (isset($_SESSION["admin"])) {
	  		$this->view("admin",[
	  							"Admin_navbar" => $this->admin_navbar,
	  							"Page" => "dashboard", 
	  							"Page_title"=>"admin_page_header",
	  							"Title" => "Bảng điều khiển",
	  							"Breadcrumb" => $this->breadcrumb,
	  			]);
	  	}else{
	  		if (isset($_POST["login"])) {
		  	  $data =	array();
		  	  $data["username"] = $_POST["username"];
		  	  $data["password"] = $_POST["password"];
		  	  $data["remember"] = 0;
		  	  if(isset($_POST["remember"])){
		  	  	$data["remember"] = 1;
		  	  }
		  	  
		  	  $result = $this->UserModel->Login($data); 
		  	  if ($result =="false") {
		  	  	$this->view("page_login",[
		  							"Admin_navbar" => $this->admin_navbar,
		  							"Page_title"=>"admin_page_header",
		  							"Title" => "Bảng điều khiển",
		  							"Breadcrumb" => $this->breadcrumb,
		  							"Error" => "",
		  			]);
		  	  }else{
		  	  	$_SESSION["admin"] = json_decode($result, TRUE);
		  	  	$this->view("admin",[
		  							"Page" => "dashboard", 
		  							"Page_title"=>"admin_page_header",
		  							"Title" => "Bảng điều khiển",
		  							"Breadcrumb" => $this->breadcrumb,
		  							"Admin" => $result,
		  			]);
		  	  }
		  	}else{
		  		$this->view("page_login",[
		  							// "Admin_navbar" => $this->admin_navbar, 
		  							// "Page_title"=>"admin_page_header",
		  							// "Title" => "Bảng điều khiển",
		  							// "Breadcrumb" => $this->breadcrumb
		  			]);
		  	}
	  	}
	  	  	
	  }

	  public function LogOut(){
	  	unset($_SESSION['admin']);
	  	// echo "true";
	  }
	} 
?>
