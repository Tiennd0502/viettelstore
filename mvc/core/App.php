<?php 
  class App{

		protected $controller = "Home";
		protected $action     = "Index";
		protected $params     = [];

  	function __construct(){
  		
  		$arr = $this->UrlProcess();

  		// xử lý controller
  		if (!empty($arr[0]) && file_exists("./mvc/controllers/".$arr[0].".php")) {
  			$this->controller = ucfirst(strtolower($arr[0]));
  			unset($arr[0]);
  		}
  		require_once "./mvc/controllers/".$this->controller.".php";
  		$this->controller = new $this->controller;
  		//xử lý action
  		if (isset($arr[1])) {
  			//kiểm tra hàm có tồn tại trong class k
  			if(method_exists($this->controller,$arr[1])){
  				$this->action = $arr[1];
  			}
  			unset($arr[1]);
  		}
  		//xử lý param 
  		$this->params = $arr ? array_values($arr) : [];
  		// gọi thực hiện khởi tạo biến có lớp controller chạy hàm $this->action và tham số là $this->params;
  		call_user_func_array([$this->controller,$this->action],$this->params);
  	}

  	function UrlProcess(){
  		if (isset($_GET['url'])) {
  			return explode("/",filter_var(trim($_GET['url'],"/")));
  		}
  		
  	}
  }
  
 ?>