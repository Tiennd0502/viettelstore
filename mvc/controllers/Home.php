<?php  
	
	class Home extends Controller{
		public $Categorys;
		public $CategoryModel;
		public $ProductModel;
		
		
		public function __construct(){
			// $this->Categorys = $this->model("CategoryModel")->AllCategorys();
			// $this->CategoryModel = $this->model("CategoryModel");
			// $this->ProductModel = $this->model("ProductModel");
		}

	  public function Index(){
	  	$this->view("home",[
	  							"Page" => "home"
	  						]);
	  	// $this->view("home",[
	  	// 						"Page" => "home", 
	  	// 						"Categorys" =>$this->Categorys,
	  	// 						"Products"=> $this->ProductModel->AllProducts(),
	  	// 						"Mobile" => $this->ProductModel->ProductByCategory(1),
	  	// 						"Laptop" => $this->ProductModel->ProductByCategory(2),
	  	// 						"Tablet" => $this->ProductModel->ProductByCategory(3),
	  	// 						"Fwatch" => $this->ProductModel->ProductByCategory(5),
	  	// 						"Swatch" => $this->ProductModel->ProductByCategory(6),
	  	// 						"BGC"=> "#f0f0f0",
	  	// 					]);
	  } 
	  // <?= strtolower(str_replace(' ','-',$mobile['name']))//
	  // $a, $b lấy từ url($param) về
	  public function UserRegis(){
	  	if (isset($_POST['register'])) {
	  		//lấy giữ liệu gửi lên
				$data             = array();
				$data['userName'] = $_POST['userName'];
				$data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$data['fullName'] = $_POST['fullName'];
				$date = explode("-",$_POST['birthday']);
      	$date = mktime(0, 0, 0, $date[1], $date[2], $date[0]);
				$data['birthday'] = $date;
				$data['email']    = $_POST['email'];
				$data['phone']    =$_POST['phone'];
				$data['address']  = $_POST['address'];
	  		// Insert vào bảng
	  		$result =$this->UserModel->InsertNewUser($data);
	  		$this->view("master1",[
	  							"Page" => "home", 
	  							"Categorys" =>$this->CategoryModel->Category(),
	  							"Products"=> $this->ProductModel->ProductList(),
	  							"Result" => $result
	  						]);
	  		// Show ok hoặc fail
	  	}
	  	// muốn lấy dữ liệu thằng nào thì gọi model nó vào
	  	// goi model
			// $teo  = $this->model("SinhVienModel");
			// $tong = $teo->Tong($a,$b);
			// //gọi view
	  // 	$this->view("aodep",["Page" => "news", "Number" =>$tong,"Mau" => "red","SV" => $teo->SinhVien() ]);
	  	
	  }

	}
	

 ?>
