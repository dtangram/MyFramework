<?php

  class login extends AppController{
    public function __construct($parent){
      $this->parent=$parent;
    }

    public function index(){
      $data = array();
      $data["pagename"] = "login";
      $data["navigation"] = array("home"=>"/welcome", "register"=>"/register", "login"=>"/login", "about"=>"/about");

      $this->parent->getView("header", $data);
      $this->parent->getView("loginForms");
      $this->parent->getView("footer");
    }

    public function receive(){
      if($_POST["type"] == "form"){
        $this->receiveReq();
      }

      else{
        $this->receiveAjax();
      }
    }

    public function receiveReq(){
      if($_POST["email"] == "Mike@aol.com" && $_POST["password"] == "password" || $_POST["email"] == "Joe@aol.com" && $_POST["password"] == "password"){
        $_SESSION["isLoggedIn"] = "1";
        $_SESSION["userEmail"] = $_POST["email"];
        header("location:/crud");
      }

      else{
        $_SESSION["isLoggedIn"] = "0";
        $_SESSION["userEmail"] = "";
        header("location:/login?msg=Invalid User");
      }
    }

    public function receiveAjax(){
      if($_POST["email"] == "dtangram@yahoo.com" && $_POST["password"] == 1234){
        echo "Good";
      }

      else{
        echo "Bad";
      }
    }
  }

?>
