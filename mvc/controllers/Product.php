<?php 
	
	class Product extends Controller{
		public $breadcrumb = "Bảng điều khiển";
		public $admin_navbar = "admin_navbar";
		public $title = "Hàng hóa";
		public $path  = "Product";
		public $current = "Product";

		public $ProductModel;
		public $CategoryModel;
		public $TrademarkModel;

		public function __construct(){
			$this->ProductModel = $this->model("ProductModel");
			$this->CategoryModel = $this->model("CategoryModel");
			$this->TrademarkModel = $this->model("TrademarkModel");
		}
		public function Index(){
			if (isset($_SESSION["admin"])) {
				$categorys = $this->CategoryModel->AllCategorys();
				$trademarks = $this->TrademarkModel->AllTrademarks();
				$products = $this->ProductModel->AllProducts();
				$this->view("admin",[
										"Admin_navbar" => $this->admin_navbar,
										"Current" => $this->current,
		  							"Page" => "product_list",
		  							"Page_title"=>"admin_header", 
		  							"Title" => $this->title,
	  								"Breadcrumb" => $this->breadcrumb,
	  								"Products" => $products,
	  								"Categorys" => $categorys,
	  								"Trademarks" => $trademarks
										]);
			}else {
	  		echo '<h3> Vui lòng <a href="admin" >đăng nhập</a> trước khi sử dụng chức năng</h3>';
	  		exit;
	  	}
		}
		public function AddProduct(){
			if (isset($_SESSION["admin"])) {
				$categorys = $this->CategoryModel->AllCategorys();
				$trademarks = $this->TrademarkModel->AllTrademarks();
				if (isset($_POST["addProduct"])) {
					$data                          = array();
					$data["category_id"]           = $_POST["category_id"];
					$data["trademark_id"]          = $_POST["trademark_id"];
					$data["name"]                  = $_POST["name"];
					if (isset($_FILES["image"])) {
						$data["image"]               = $_FILES["image"];
					}
					if (isset($_FILES["image_hot"])) {
						$data["image_hot"]               = $_FILES["image_hot"];
					}
					if (isset($_FILES["icon"])) {
						$data["icon"]                = $_FILES["icon"];
					}
					if(isset($_FILES["library"])){
						$data["library"]             = $_FILES["library"];
					}
					if(isset($_FILES["carousel"])){
						$data["carousel"]            = $_FILES["carousel"];
					}
					$data["price"]                 = $_POST["price"];
					$data["discount"]              = $_POST["discount"];
					$data["description"]           = $_POST["description"];
					$data["gift"]                  = $_POST["gift"];
					$data["hot"]                   = $_POST["hot"];
					$data["installment"]           = $_POST["installment"];
					$data["active"]                = $_POST["active"];
					$data["screen"]                = $_POST["screen"];
					$data["operating_system"]      = $_POST["operating_system"];
					$data["rear_camera"]           = $_POST["rear_camera"];
					$data["front_camera"]          = $_POST["front_camera"];
					$data["cpu"]                   = $_POST["cpu"];
					$data["ram"]                   = $_POST["ram"];
					$data["internal_memory"]       = $_POST["internal_memory"];
					$data["memory_stick"]          = $_POST["memory_stick"];
					$data["sim"]                   = $_POST["sim"];
					$data["battery_capacity"]      = $_POST["battery_capacity"];
					$data["port_connect"]          = $_POST["port_connect"];
					$data["conversation"]          = $_POST["conversation"];
					$data["graphic_card"]          = $_POST["graphic_card"];
					$data["design"]                = $_POST["design"];
					$data["size"]                  = $_POST["size"];
					$data["launch_time"]           = $_POST["launch_time"];
					$data["optical_drive"]         = $_POST["optical_drive"];
					$data["machine_type"]          = $_POST["machine_type"];
					$data["function"]              = $_POST["function"];
					$data["wattage"]               = $_POST["wattage"];
					$data["print_speed"]           = $_POST["print_speed"];
					$data["printing_life"]         = $_POST["printing_life"];
					$data["print_quality"]         = $_POST["print_quality"];
					$data["ink_types"]             = $_POST["ink_types"];
					$data["first_page_time"]       = $_POST["first_page_time"];
					$data["where_product"]         = $_POST["where_product"];
					$data["printer_compatibility"] = $_POST["printer_compatibility"];
					$data["max_printer_page"]      = $_POST["max_printer_page"];
					$data["face_diameter"]         = $_POST["face_diameter"];
					$data["face_material"]         = $_POST["face_material"];
					$data["frame_material"]        = $_POST["frame_material"];
					$data["wire_width"]            = $_POST["wire_width"];
					$data["wire_material"]         = $_POST["wire_material"];
					$data["utilities"]             = $_POST["utilities"];
					$data["waterproof"]            = $_POST["waterproof"];
					$data["battery_life_time"]     = $_POST["battery_life_time"];
					$data["object_use"]            = $_POST["object_use"];
					// Insert dữ liệu
					$result = $this ->ProductModel->InsertProduct($data);
					// echo $result;
					$this->view("admin",[
											"Admin_navbar" => $this->admin_navbar,
											"Current" => $this->current,
			  							"Page" => "product_add",
			  							"Page_title"=>"admin_header", 
			  							"Title" => $this->title,
			  							"Current_title" => "Thêm hàng hóa",
			  							"Path"	=> $this->path,
		  								"Breadcrumb" => $this->breadcrumb,
		  								"Categorys" => $categorys,
		  								"Trademarks" => $trademarks,
		  								"Result" => $result,
		  								"Action" => "Thêm"
										]);
				}else {
					$this->view("admin",[
											"Admin_navbar" => $this->admin_navbar,
											"Current" => $this->current,
			  							"Page" => "product_add",
			  							"Page_title"=>"admin_header", 
			  							"Title" => $this->title,
			  							"Current_title" => "Thêm hàng hóa",
			  							"Path"	=> $this->path,
		  								"Breadcrumb" => $this->breadcrumb,
		  								"Categorys" => $categorys,
		  								"Trademarks" => $trademarks,
		  								"Insert" => ""
										]);
				}
			}else {
	  		echo '<h3> Vui lòng <a href="admin" >đăng nhập</a> trước khi sử dụng chức năng</h3>';
	  		exit;
	  	}
		}
		public function EditProduct($id){
			if (isset($_SESSION["admin"])) {
				$categorys = $this->CategoryModel->AllCategorys();
				$trademarks = $this->TrademarkModel->AllTrademarks();
				if(isset($_POST["editProduct"])){
					$data                          = array();
					$data["id"]           				 = $_POST["id"];
					$data["category_id"]           = $_POST["category_id"];
					$data["trademark_id"]          = $_POST["trademark_id"];
					$data["name"]                  = $_POST["name"];
					if (isset($_FILES["image"])) {
						$data["image"]               = $_FILES["image"];
					}
					if (isset($_FILES["image_hot"])) {
						$data["image_hot"]               = $_FILES["image_hot"];
					}
					if (isset($_FILES["icon"])) {
						$data["icon"]                = $_FILES["icon"];
					}
					if(isset($_FILES["library"])){
						$data["library"]             = $_FILES["library"];
					}
					if(isset($_FILES["carousel"])){
						$data["carousel"]            = $_FILES["carousel"];
					}
					// $data["linkImage"]						 = $_POST["linkImage"];
					// $data["linkIcon"]						 	 = $_POST["linkIcon"];

					$data["price"]                 = $_POST["price"];
					$data["discount"]              = $_POST["discount"];
					$data["description"]           = $_POST["description"];
					$data["gift"]                  = $_POST["gift"];
					$data["hot"]                   = $_POST["hot"];
					$data["installment"]           = $_POST["installment"];
					$data["active"]                = $_POST["active"];
					$data["screen"]                = $_POST["screen"];
					$data["operating_system"]      = $_POST["operating_system"];
					$data["rear_camera"]           = $_POST["rear_camera"];
					$data["front_camera"]          = $_POST["front_camera"];
					$data["cpu"]                   = $_POST["cpu"];
					$data["ram"]                   = $_POST["ram"];
					$data["internal_memory"]       = $_POST["internal_memory"];
					$data["memory_stick"]          = $_POST["memory_stick"];
					$data["sim"]                   = $_POST["sim"];
					$data["battery_capacity"]      = $_POST["battery_capacity"];
					$data["port_connect"]          = $_POST["port_connect"];
					$data["conversation"]          = $_POST["conversation"];
					$data["graphic_card"]          = $_POST["graphic_card"];
					$data["design"]                = $_POST["design"];
					$data["size"]                  = $_POST["size"];
					$data["launch_time"]           = $_POST["launch_time"];
					$data["optical_drive"]         = $_POST["optical_drive"];
					$data["machine_type"]          = $_POST["machine_type"];
					$data["function"]              = $_POST["function"];
					$data["wattage"]               = $_POST["wattage"];
					$data["print_speed"]           = $_POST["print_speed"];
					$data["printing_life"]         = $_POST["printing_life"];
					$data["print_quality"]         = $_POST["print_quality"];
					$data["ink_types"]             = $_POST["ink_types"];
					$data["first_page_time"]       = $_POST["first_page_time"];
					$data["where_product"]         = $_POST["where_product"];
					$data["printer_compatibility"] = $_POST["printer_compatibility"];
					$data["max_printer_page"]      = $_POST["max_printer_page"];
					$data["face_diameter"]         = $_POST["face_diameter"];
					$data["face_material"]         = $_POST["face_material"];
					$data["frame_material"]        = $_POST["frame_material"];
					$data["wire_width"]            = $_POST["wire_width"];
					$data["wire_material"]         = $_POST["wire_material"];
					$data["utilities"]             = $_POST["utilities"];
					$data["waterproof"]            = $_POST["waterproof"];
					$data["battery_life_time"]     = $_POST["battery_life_time"];
					$data["object_use"]            = $_POST["object_use"];
					// Update dữ liệu
					$result = $this ->ProductModel->UpdateProduct($data);

					if ($result) {
						$products = $this->ProductModel->Allproducts();
						$this->view("admin",[
											"Admin_navbar" => $this->admin_navbar,
											"Current" => $this->current,
			  							"Page" => "product_list",
			  							"Page_title"=>"admin_header", 
			  							"Title" => $this->title,
			  							"Current_title" => "Danh sách hàng hóa",
			  							"Path"	=> $this->path,
		  								"Breadcrumb" => $this->breadcrumb,
		  								"Categorys" => $categorys,
		  								"Trademarks" => $trademarks,
		  								"Products"	=> $products,
		  								"Result" => $result,
		  								"Action" => "Sửa"
											]);
					}else{
						$item = $this->ProductModel->GetOneProduct($id);
						$this->view("admin",[
											"Admin_navbar" => $this->admin_navbar,
											"Current" => $this->current,
			  							"Page" => "product_add",
			  							"Page_title"=>"admin_header", 
			  							"Title" => $this->title,
			  							"Current_title" => "Sửa hàng hóa",
			  							"Path"	=> $this->path,
		  								"Breadcrumb" => $this->breadcrumb,
		  								"Categorys" => $categorys,
		  								"Trademarks" => $trademarks,
		  								"Item"		=> $item,
		  								"Result" => $result,
		  								"Action" => "Sửa"
										]);
					}	
				}else {
					$item = $this->ProductModel->GetOneProduct($id);
					$this->view("admin",[
											"Admin_navbar" => $this->admin_navbar,
											"Current" => $this->current,
			  							"Page" => "product_add",
			  							"Page_title"=>"admin_header", 
			  							"Title" => $this->title,
			  							"Current_title" => "Sửa hàng hóa",
			  							"Path"	=> $this->path,
		  								"Breadcrumb" => $this->breadcrumb,
		  								"Categorys" => $categorys,
		  								"Trademarks" => $trademarks,
		  								"Item" => $item,
										]);
				}
			}else {
	  		echo '<h3> Vui lòng <a href="admin" >đăng nhập</a> trước khi sử dụng chức năng</h3>';
	  		exit;
	  	}
		}
		public function DeleteProduct($id){
			if (isset($_SESSION["admin"])) {
				$categorys = $this->CategoryModel->AllCategorys();
				$trademarks = $this->TrademarkModel->AllTrademarks();

				$result = $this->ProductModel->DeleteProduct($id);
				$products = $this->ProductModel->Allproducts();
				$this->view("admin",[
										"Admin_navbar" => $this->admin_navbar,
										"Current" => $this->current,
		  							"Page" => "product_list",
		  							"Page_title"=>"admin_header", 
		  							"Title" => $this->title,
		  							"Current_title" => "Danh sách hàng hóa",
		  							"Path"	=> $this->path,
	  								"Breadcrumb" => $this->breadcrumb,
	  								"Categorys" => $categorys,
	  								"Trademarks" => $trademarks,
	  								"Products" => $products,
										"Result"	=> $result,
										"Action"	=> "Xóa",
									]);
			}else {
	  		echo '<h3> Vui lòng <a href="admin" >đăng nhập</a> trước khi sử dụng chức năng</h3>';
	  		exit;
	  	}
		}

		public function CopyProduct($id){
			if (isset($_SESSION["admin"])) {
				$categorys = $this->CategoryModel->AllCategorys();
				$trademarks = $this->TrademarkModel->AllTrademarks();
				if(isset($_POST["addProduct"])){
					$data                          = array();
					$data["category_id"]           = $_POST["category_id"];
					$data["trademark_id"]          = $_POST["trademark_id"];
					$data["name"]                  = $_POST["name"];
					if (isset($_FILES["image"])) {
						$data["image"]               = $_FILES["image"];
					}
					if (isset($_FILES["image_hot"])) {
						$data["image_hot"]               = $_FILES["image_hot"];
					}
					if (isset($_FILES["icon"])) {
						$data["icon"]                = $_FILES["icon"];
					}
					if(isset($_FILES["library"])){
						$data["library"]             = $_FILES["library"];
					}
					if(isset($_FILES["carousel"])){
						$data["carousel"]            = $_FILES["carousel"];
					}
					// $data["linkImage"]						 = $_POST["linkImage"];
					// $data["linkIcon"]						 	 = $_POST["linkIcon"];
					$data["price"]                 = $_POST["price"];
					$data["discount"]              = $_POST["discount"];
					$data["description"]           = $_POST["description"];
					$data["gift"]                  = $_POST["gift"];
					$data["hot"]                   = $_POST["hot"];
					$data["installment"]           = $_POST["installment"];
					$data["active"]                = $_POST["active"];
					$data["screen"]                = $_POST["screen"];
					$data["operating_system"]      = $_POST["operating_system"];
					$data["rear_camera"]           = $_POST["rear_camera"];
					$data["front_camera"]          = $_POST["front_camera"];
					$data["cpu"]                   = $_POST["cpu"];
					$data["ram"]                   = $_POST["ram"];
					$data["internal_memory"]       = $_POST["internal_memory"];
					$data["memory_stick"]          = $_POST["memory_stick"];
					$data["sim"]                   = $_POST["sim"];
					$data["battery_capacity"]      = $_POST["battery_capacity"];
					$data["port_connect"]          = $_POST["port_connect"];
					$data["conversation"]          = $_POST["conversation"];
					$data["graphic_card"]          = $_POST["graphic_card"];
					$data["design"]                = $_POST["design"];
					$data["size"]                  = $_POST["size"];
					$data["launch_time"]           = $_POST["launch_time"];
					$data["optical_drive"]         = $_POST["optical_drive"];
					$data["machine_type"]          = $_POST["machine_type"];
					$data["function"]              = $_POST["function"];
					$data["wattage"]               = $_POST["wattage"];
					$data["print_speed"]           = $_POST["print_speed"];
					$data["printing_life"]         = $_POST["printing_life"];
					$data["print_quality"]         = $_POST["print_quality"];
					$data["ink_types"]             = $_POST["ink_types"];
					$data["first_page_time"]       = $_POST["first_page_time"];
					$data["where_product"]         = $_POST["where_product"];
					$data["printer_compatibility"] = $_POST["printer_compatibility"];
					$data["max_printer_page"]      = $_POST["max_printer_page"];
					$data["face_diameter"]         = $_POST["face_diameter"];
					$data["face_material"]         = $_POST["face_material"];
					$data["frame_material"]        = $_POST["frame_material"];
					$data["wire_width"]            = $_POST["wire_width"];
					$data["wire_material"]         = $_POST["wire_material"];
					$data["utilities"]             = $_POST["utilities"];
					$data["waterproof"]            = $_POST["waterproof"];
					$data["battery_life_time"]     = $_POST["battery_life_time"];
					$data["object_use"]            = $_POST["object_use"];
					// Update dữ liệu
					$result = $this ->ProductModel->InsertProduct($data);

					if ($result) {
						$products = $this->ProductModel->Allproducts();
						$this->view("admin",[
											"Admin_navbar" => $this->admin_navbar,
											"Current" => $this->current,
			  							"Page" => "product_list",
			  							"Page_title"=>"admin_header", 
			  							"Title" => $this->title,
			  							"Current_title" => "Danh sách hàng hóa",
			  							"Path"	=> $this->path,
		  								"Breadcrumb" => $this->breadcrumb,
		  								"Categorys" => $categorys,
		  								"Trademarks" => $trademarks,
		  								"Products"	=> $products,
		  								"Result" => $result,
		  								"Action" => "Thêm"
											]);
					}else{
						$item = $this->ProductModel->GetOneProduct($id);
						$this->view("admin",[
											"Admin_navbar" => $this->admin_navbar,
											"Current" => $this->current,
			  							"Page" => "product_add",
			  							"Page_title"=>"admin_header", 
			  							"Title" => $this->title,
			  							"Current_title" => "Sửa hàng hóa",
			  							"Path"	=> $this->path,
		  								"Breadcrumb" => $this->breadcrumb,
		  								"Categorys" => $categorys,
		  								"Trademarks" => $trademarks,
		  								"Item"		=> $item,
		  								"Result" => $result,
		  								"Action" => "Thêm"
										]);
					}	
				}else {
					$item = $this->ProductModel->GetOneProduct($id);
					$this->view("admin",[
											"Admin_navbar" => $this->admin_navbar,
											"Current" => $this->current,
			  							"Page" => "product_add",
			  							"Page_title"=>"admin_header", 
			  							"Title" => $this->title,
			  							"Current_title" => "Thêm hàng hóa",
			  							"Path"	=> $this->path,
		  								"Breadcrumb" => $this->breadcrumb,
		  								"Categorys" => $categorys,
		  								"Trademarks" => $trademarks,
		  								"Item" => $item,
		  								"Insert" => ""
										]);
				}
			}else {
	  		echo '<h3> Vui lòng <a href="admin" >đăng nhập</a> trước khi sử dụng chức năng</h3>';
	  		exit;
	  	}
		}

	}

 ?>