<?php
/*
	File:    helper.php
	Purpose: store as variables used by more than one page
           functions used on other pages
	Authors: Barbara Bianca Zacchi
			     Millene L B S Cesconetto
			     Olha Tymoshchuk 
*/
  session_start();

  $aPurchases = array();
  array_push($aPurchases, 'Home Phone');
  array_push($aPurchases, 'Mobile Phone');
  array_push($aPurchases, 'Smart TV');
  array_push($aPurchases, 'Laptop');
  array_push($aPurchases, 'Desktop Computer');
  array_push($aPurchases, 'Tablet');
  array_push($aPurchases, 'Home Theater');
  array_push($aPurchases, 'MP3 player');

  $purchasesSelect = array();
  if (isset($_SESSION['purchases']))
  {
    foreach ($_SESSION['purchases'] as $key=>$value){
      $tmp = array();
      $tmp['key']   = $key;
      $tmp['value'] = $aPurchases[$key];
      array_push($purchasesSelect, $tmp);
      unset($tmp);
    }
  }

  function ClearSection($purchasesSelect){
    if (isset($_SESSION["name"])){  
      unset($_SESSION['name']);
    }
    if (isset($_SESSION["age"])){  
      unset($_SESSION["age"]);
    }

    if (isset($_SESSION["student"])){ 
      unset($_SESSION["age"]);
    }

    if (isset($_SESSION["howPurchased"])){ 
      unset($_SESSION["howPurchased"]);
    } 

    foreach($purchasesSelect as $v){
      if (isset($_SESSION["satisfaction".$v['key']])){
        unset($_SESSION["satisfaction".$v['key']]);
      }

      if (isset($_SESSION["recommend".$v['key']])){
        unset($_SESSION["recommend".$v['key']]);
      }
    }


       


  }
  function GetNameGlobal(){
    $aux = "";
    if (isset($_SESSION["name"])){  
        $aux = $_SESSION["name"];
    }
    return $aux;
  }

  function GetAgeGlobal(){
    $aux = "";  
    if (isset($_SESSION["age"])){  
        $aux = $_SESSION["age"];
    }
    return $aux;
  }

  function GetStudentGlobal(){
    $aux = "-";  
    if (isset($_SESSION["student"])){  
      if($_SESSION['student']== "0"){ $aux = "No";}
      else if($_SESSION['student']== "1"){ $aux = "Yes, Part time";}
      else if($_SESSION['student']== "2"){ $aux = "Yes, Full time";}
    }
    return $aux;
  }

  function GetStudentGlobalChar(){
    $aux = "-";  
    if (isset($_SESSION["student"])){  
      $aux = $_SESSION['student'];
    }
    return $aux;
  }

  function GetHowPurchasedGlobal(){
    $aux = "-";  
    if (isset($_SESSION["howPurchased"])){  
      switch($_SESSION["howPurchased"]){
          case "online":
              $aux = "Online";
              break;
          case "phone":
              $aux = "By phone";
              break;
          case "apps":
              $aux = "Mobile App";
              break;
          case "store":
              $aux = "In store";
              break;
          case "mail":
              $aux = "By mail";
              break;   
          default: 
              $aux = "";
              break;
        }
      }
    return $aux;
  }

  function GetArrayPurchaseGlobal($purchasesSelect,$aPurchases){
      $aux_PurchaseGlobal = array();
      foreach($purchasesSelect as $v){
        $tmp = array();
        $tmp['key']   = $v['key'];
        $tmp['value'] = $aPurchases[$v['key']];
        $tmp['satisfaction'] = 0;
        if (isset($_SESSION["satisfaction".$v['key']])){
          $tmp['satisfaction'] = $_SESSION["satisfaction".$v['key']];
        } 
        $tmp['recommend'] = "";
        if (isset($_SESSION["recommend".$v['key']])){
           switch( $_SESSION["recommend".$v['key']]){
            case "1":
              $aux = "Yes";
              break;
            case "2":
              $aux = "Maybe";
              break;
             case "3":
              $aux = "No";
              break;               
            default: 
              $aux = "";
              break;
            }
            $tmp['recommend'] = $aux;
        }      
        array_push($aux_PurchaseGlobal, $tmp);
        unset($tmp); 
      }
      return $aux_PurchaseGlobal; 
  }

  
  /*Retrieve erro message*/
  function display_error($error_msg){
    echo "<p>\n";
    foreach($error_msg as $v){
    echo $v."<br>\n";
    }
    echo "</p>\n";
  } 



