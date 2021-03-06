<?php

  class crud extends AppController{
    public function __construct($parent){
      $this->parent=$parent;

      //PROTECT PAGE. PREVENT UNAUTHORIZED ACCESS TO PAGE
      if(!@$_SESSION["isLoggedIn"] || @$_SESSION["isLoggedIn"] != "1"){
        header("location:/login?msg=Not Allowed");
      }
    }

    public function index(){
      $data = array();
      $data["pagename"] = "crud";
      $data["navigation"] = array("home"=>"/welcome", "register"=>"/register", "login"=>"/login", "about"=>"/about");

      $this->parent->getView("header", $data);
      $this->parent->getView("crud");
      $this->parent->getView("footer");
    }
  }

?>
