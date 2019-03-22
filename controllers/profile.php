<?php

  class profile extends AppController{
    public function __construct($parent){
      $this->parent=$parent;

      //PROTECT PAGE. PREVENT UNAUTHORIZED ACCESS TO PAGE
      if(!@$_SESSION["isLoggedIn"] || @$_SESSION["isLoggedIn"] != "1"){
        header("location:/login?msg=Not Allowed");
      }
    }

    public function index(){
      $data = array();
      $data["pagename"] = "profile";
      $data["navigation"] = array("home"=>"/welcome", "register"=>"/register", "login"=>"/login", "about"=>"/about");

      // var_dump(file_get_contents("./assets/note.xml"));
      // $file = "./assets/login.txt";
      // $h = fopen($file, "r");
      // $contents = file_get_contents($file);
      // // $content = fread($h, filesize($file));
      //
      // $lines = explode("\n", $contents);
      //
      // foreach($lines as $word) {
      //     echo $word;
      // }
      //
      // // var_dump($content);
      //
      // fclose($h);

      $_SESSION["isLoggedInAsMike"] = "Mike@aol.com";
      $_SESSION["isLoggedInAsJoe"] = "Joe@aol.com";
      $_SESSION["userPassword"] = "password";

      if($_SESSION["isLoggedInAsMike"] == "Mike@aol.com" && $_SESSION["userPassword"] == "password"){
        function get_rowOne(){
          $emails = array();
          $file = file("./assets/login.txt");

          foreach ($file as $emailAddresses){
            // CHECK FOR EMPTY SPACES, IF NONE, READ THE FIRST CHARACTER THAT'S NOT A SPACE ALL THE WAY TO THE PIKE (|)
            if (trim($emailAddresses) != ''){
              //READ THE DATA ALL THE WAY TO THE FIRST PIKE (|)
              $explodeTxt = explode("|", $emailAddresses);

              //GRAB EVERYTHING BEFORE THE FIRST PIKE (|)
              $emails[] = $explodeTxt[0];
            }
          }

          //RETURN THE ARRAY
          return $emails;
        }

        // COMBINE EVERYTHING AND SEPERATE WITH COMMAS
        echo implode(', ', get_rowOne());
      }

      else{
        if($_SESSION["isLoggedInAsJoe"] == "Joe@aol.com" && $_SESSION["userPassword"] == "password"){
          function get_rowTwo(){
            $emails = array();
            $file = file("./assets/login.txt");

            foreach ($file as $emailAddresses){
              // CHECK FOR EMPTY SPACES, IF NONE, READ THE FIRST CHARACTER THAT'S NOT A SPACE ALL THE WAY TO THE PIKE (|)
              if (trim($emailAddresses) != ''){
                //READ THE DATA ALL THE WAY TO THE FIRST PIKE (|)
                $explodeTxt = explode("|", $emailAddresses);

                //GRAB EVERYTHING BEFORE THE FIRST PIKE (|)
                $emails[] = $explodeTxt[1];
              }
            }

            //RETURN THE ARRAY
            return $emails;
          }

          // COMBINE EVERYTHING AND SEPERATE WITH COMMAS
          echo implode(', ', get_rowTwo());
        }
      }


      $this->parent->getView("header", $data);
      $this->parent->getView("profile");
      $this->parent->getView("footer");
    }

    //LOAD AND UPDATE PHOTO OR FILE ON PAGE
    public function updatePicture(){
      if($_FILES["myFile"]["type"] == "image/jpg" || $_FILES["myFile"]["type"] == "image/jpeg"){
        if(move_uploaded_file($_FILES["myFile"]["tmp_name"], "./assets/myImage.jpg")){
          header("location:/profile");
        }

        else{
          echo "problem uploading";
        }
      }

      else{
        header("location:/profile?msg=Not Allowed");
      }
    }
  }

?>
