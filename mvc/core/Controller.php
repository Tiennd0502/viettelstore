<?php 
	
	class Controller{
		// require file truyền vào khi được gọi
		public function model($model){
			require_once "./mvc/models/".$model.".php";
			return new $model;
		}

		public function view($view, $data = []){
			require_once "./mvc/views/".$view.".php";
		}
	}
	
 ?>