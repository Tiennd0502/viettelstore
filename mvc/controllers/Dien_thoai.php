<?php
  class Dien_thoai extends Controller{
    public $background = "#fff";
    public function Index(){
      $this->view("home",[
                  "Page"=> "mobile",
                  "Background"=> $this->background,
      ]);
    }
    public function adb(){}  
  }
?>