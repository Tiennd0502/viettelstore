<?php
  class Dien_thoai extends Controller{
    public $ProductModel;
    public $TrademarkModel;
    public $CategoryModel;
    public $EvaluateModel;

    public $Categorys;
    public $CurrentPage = "Dien_thoai";
    public $name ="Điện thoại";
    public $background = "#fff";

    public function __construct(){
      $this->ProductModel = $this->model("ProductModel");
      $this->TrademarkModel = $this->model("TrademarkModel");
      $this->CategoryModel = $this->model("CategoryModel");
      $this->EvaluateModel = $this->model("EvaluateModel");

      $this->Categorys= $this->CategoryModel->AllCategorys();
    }
    
    public function Index(){
      $trademarks = $this->TrademarkModel->TrademarkByCategory(1);
      $mobiles = $this->ProductModel->ProductByCategory(1);
     
      $this->view("home",[
                "Page"=> "mobile",
                "Background"=> $this->background,
                "Trademarks" => $trademarks,
                "Mobile" => $mobiles,
                "CategoryId" => "1",
      ]);
     
    }
    public function Detail($id){
      $this->ProductModel->IncreaseViews($id);
      $product = $this->ProductModel->GetOneProduct($id);
      $trademark = $this->ProductModel->GetTrademarkProduct($id);
      $allTrademarkProduct = $this->ProductModel->AllTrademarkProduct($id);
      $evaluate = $this->EvaluateModel->GetProductEvaluate($id, "evaluate");
      $listEvaluates = $this->EvaluateModel->GetProductEvaluate($id, "content");
      $category = 
      $this->view("home",[
                    "Page" => "detail",
                    "Background"=> $this->background,
                    "Categorys" => $this->Categorys,
                    "CurrentPage" => $this->CurrentPage,
                    "Product" => $product,
                    "Trademark" => $trademark,
                    "AllTrademarkProduct" => $allTrademarkProduct,
                    "Evaluate" => $evaluate,
                    "ContentEvaluate" => $listEvaluates,
                    "SubLink"=> $this->name,
                  ]);
    }  
  }
?>