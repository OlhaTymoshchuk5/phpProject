<!-- 
	File:    survey3.php
	Purpose: Data from "Part 3" of the survey according to project instructions
	Authors: Barbara Bianca Zacchi
			     Millene Cesconetto
			     Olha Tymoshchuk 
-->
<html>
  <head>
    <title> Survey - Part 3</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet">
  </head>
  <?php 
  
    
    include  "helper.php";
    
    if (isset($_POST["previous"])) {
      header("Location: ./survey2.php");
    }
  
    if (isSet($_POST["submit"])){
      $error_msg = validate_satisfaction($purchasesSelect);  
      if (count($error_msg) == 0){
       header("Location: ./summary.php");
      }else{
 		    display_error($error_msg);
 	    }  
    }
  ?> 

  <body>
    <h1>SURVEY 3 PAGE</h1>
  
    <form method="POST" action="survey3.php">
       <?php
        foreach($purchasesSelect as $v){
      ?>

      <h3><?php echo $v['value'] ; ?></h3><br>
      <label>How happy are you with this device on a scale from 1 (not satisfied) to 5 (very satisfied)?</label><br>
      <input type="radio" name="satisfaction<?php echo $v['key'];?>" value="1" <?php if (isset($_SESSION["satisfaction".$v['key']]) && ($_SESSION["satisfaction".$v['key']]== "1")){ echo "checked";}else{echo null;} ?>/> 1<br>
      <input type="radio" name="satisfaction<?php echo $v['key'];?>" value="2" <?php if (isset($_SESSION["satisfaction".$v['key']]) && ($_SESSION["satisfaction".$v['key']]== "2")){ echo "checked";}else{echo null;} ?>/> 2<br>
      <input type="radio" name="satisfaction<?php echo $v['key'];?>" value="3" <?php if (isset($_SESSION["satisfaction".$v['key']]) && ($_SESSION["satisfaction".$v['key']]== "3")){ echo "checked";}else{echo null;} ?>/> 3<br>
      <input type="radio" name="satisfaction<?php echo $v['key'];?>" value="4" <?php if (isset($_SESSION["satisfaction".$v['key']]) && ($_SESSION["satisfaction".$v['key']]== "4")){ echo "checked";}else{echo null;} ?>/> 4<br>
      <input type="radio" name="satisfaction<?php echo $v['key'];?>" value="5" <?php if (isset($_SESSION["satisfaction".$v['key']]) && ($_SESSION["satisfaction".$v['key']]== "5")){ echo "checked";}else{echo null;} ?>/> 5<br><br>
     
      <label>Would you recommend the purchase of this device to a friend?</label><br>
      <select name="recommend<?php echo $v['key'];?>" class="form-control">
        <option value="0">----</option>
        <option value="1"  <?php if (isset($_SESSION["recommend".$v['key']]) && ($_SESSION["recommend".$v['key']] == "1")){ echo "selected";}?>>Yes</option>
      	<option value="2"  <?php if (isset($_SESSION["recommend".$v['key']]) && ($_SESSION["recommend".$v['key']] == "2")){ echo "selected";}?>>Maybe</option>
      	<option value="3"  <?php if (isset($_SESSION["recommend".$v['key']]) && ($_SESSION["recommend".$v['key']] == "3")){ echo "selected";}?>>No</option>
      </select>
      <br><br>
      
      <?php } 
      ?>

      <input type="submit" value="Previous" class="btn-lg btn-primary" name="previous" />
      <input type="submit" value="Next" class="btn-lg btn-primary" name="submit" />
    </form>

    <?php 

     function validate_satisfaction($purchasesSelect){
        $error_msg = array();

        foreach($purchasesSelect as $v){
          if((!empty($_POST["satisfaction".$v['key']]))){
            $_SESSION["satisfaction".$v['key']] = $_POST["satisfaction".$v['key']];
            
          } else {
            $error_msg[] =  "Select satisfaction rate of the product: ".$v['value']."<br/>";
          }

          if((!empty($_POST["recommend".$v['key']])) && 
             (isSet($_POST["recommend".$v['key']])   &&
             ($_POST["recommend".$v['key']]>=0))) {
            $_SESSION["recommend".$v['key']] = $_POST["recommend".$v['key']];
          } else {
            $error_msg[] =  "Select recommend of the product: ".$v['value']."<br/>";
          }     
        }

        return $error_msg;
     }

    ?>   
  </body>
</html>
