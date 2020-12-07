<?php  
	
	class Home extends Controller{
		public $Categorys;
		public $CategoryModel;
		public $ProductModel;
		
		
		public function __construct(){
			$this->Categorys = $this->model("CategoryModel")->AllCategorys();
			$this->CategoryModel = $this->model("CategoryModel");
			$this->ProductModel = $this->model("ProductModel");
		}

	  public function Index(){

	  	$this->view("home",[
	  							"Page" => "home",
	  							"Categorys" =>$this->Categorys,
	  							"Mobile" => $this->ProductModel->ProductByCategory(1,true),
	  							// "Laptop" => $this->ProductModel->ProductByCategory(2),
	  							// "Watch" => $this->ProductModel->ProductByCategory(3),
	  						]);
	  } 
	  // public function UserRegis(){
	  // 	if (isset($_POST['register'])) {
	  // 		//lấy giữ liệu gửi lên
			// 	$data             = array();
			// 	$data['userName'] = $_POST['userName'];
			// 	$data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
			// 	$data['fullName'] = $_POST['fullName'];
			// 	$date = explode("-",$_POST['birthday']);
   //    	$date = mktime(0, 0, 0, $date[1], $date[2], $date[0]);
			// 	$data['birthday'] = $date;
			// 	$data['email']    = $_POST['email'];
			// 	$data['phone']    =$_POST['phone'];
			// 	$data['address']  = $_POST['address'];
	  // 		// Insert vào bảng
	  // 		$result =$this->UserModel->InsertNewUser($data);
	  // 		$this->view("master1",[
	  // 							"Page" => "home", 
	  // 							"Categorys" =>$this->CategoryModel->Category(),
	  // 							"Products"=> $this->ProductModel->ProductList(),
	  // 							"Result" => $result
	  // 						]);
	  // 	}
	  // }
	}

 ?>
