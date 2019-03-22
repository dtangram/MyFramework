<?php

  class register extends AppController{
    public function __construct($parent){
      $this->parent=$parent;
    }

    public function index(){
      $data = array();

      $data["pagename"] = "register";
      $data["navigation"] = array("home"=>"/welcome", "register"=>"/register", "login"=>"/login", "about"=>"/about");

      $random = substr( md5(rand()), 0, 7);
      $data["cap"]=$random;

      $this->parent->getView("header",$data);
      $this->parent->getView("registerForm",$data);
      $this->parent->getView("footer");
    }

    public function registerConfirmed(){
      $data = array();
      $data["pagename"] = "registerConfirmed";
      $data["navigation"] = array("home"=>"/welcome", "register"=>"/register", "login"=>"/login", "about"=>"/about");

      $this->parent->getView("registerConfirmed", $data);
    }

    public function registerAction(){
      $err = array();

      $_SESSION["captchaInput"] = $_POST["usercatpcha"];

      if(!@$_POST["usercatpcha"] || @$_SESSION["captchaInput"] != @$_POST["usercatpcha"]){
        array_push($err, "Captcha Incorrect");
        header("location:/register");
      }

      if(empty($_POST["firstname"]) || $_POST["firstname"]==""){
        array_push($err, "Name does not exist");
        header("location:/register?msg=Name does not exist");
      }

      else{
        if(!preg_match("/^[a-zA-Z ]*$/", $_POST["firstname"])){
          array_push($err, "Incorrect input");
        }

        if(count($err)>0){
          header("location:/register?msg=" . implode("&", $err));
        }

        else{
          header("location:/register/registerConfirmed");
        }
      }
    }
  }

?>
