<!-- 
	File:    survey2.php
	Purpose: Data from "Part 2" of the survey according to project instructions
	Authors: Barbara Bianca Zacchi
			     Millene Cesconetto
			     Olha Tymoshchuk 
-->
<html>
  <head> 
	<title> Survey - Part 2 </title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet">
</head>
  
  <?php 

	include  "helper.php";
    if (!isSet($_SESSION['howPurchased'])) {
		$_SESSION['howPurchased']= "";
	 };

	 if (!isSet($_SESSION['purchases'])) {
		$_SESSION['purchases']= "";
	 };
	
	

    if (isset($_POST["previous"])) {
  	  header("Location: ./survey1.php");
    }
    
    if (isSet($_POST["submit"])){
  	  $error_msg = validate_buttons();
  
  	  if (count($error_msg) == 0){
  		header("Location: ./survey3.php");
  	  } else {
  		display_error($error_msg);
  	  }
    }
  ?>   
  
  <body>
    <h1>SURVEY 2 PAGE</h1>

    <form method="POST" action="survey2.php">
      <h3>How did you complete your purchase?</h3>
      <input type="radio"  name="howPurchased" value="online" <?php echo ($_SESSION['howPurchased'] == "online") ? "checked" : null; ?>/>Online
      <br>
      <input type="radio" name="howPurchased" value="phone" <?php echo ($_SESSION['howPurchased'] == "phone") ? "checked" : null; ?>/>By phone
      <br>
      <input type="radio" name="howPurchased" value="app"   <?php echo ($_SESSION['howPurchased'] == "apps") ? "checked" : null; ?>/>Mobile App
      <br>
      <input type="radio" name="howPurchased" value="store" <?php echo ($_SESSION['howPurchased'] == "store") ? "checked" : null; ?>/>In store
      <br>
      <input type="radio" name="howPurchased" value="mail" <?php echo ($_SESSION['howPurchased'] == "mail") ? "checked" : null; ?>/>By mail
      <br>
      
      <h3>Which of the following did you purchase?</h3>
      <input type="checkbox" name="purchases[0]" <?php echo isSet($_SESSION['purchases'][0]) ? "checked" : null; ?>><?php echo $aPurchases[0]?> </input>
      <br>
      <input type="checkbox" name="purchases[1]" <?php echo isSet($_SESSION['purchases'][1]) ? "checked" : null; ?>><?php echo $aPurchases[1]?> </input>
      <br>
      <input type="checkbox" name="purchases[2]" <?php echo isSet($_SESSION['purchases'][2]) ? "checked" : null; ?>><?php echo $aPurchases[2]?> </input>
      <br>
      <input type="checkbox" name="purchases[3]" <?php echo isSet($_SESSION['purchases'][3]) ? "checked" : null; ?>><?php echo $aPurchases[3]?> </input>
      <br>
      <input type="checkbox" name="purchases[4]" <?php echo isSet($_SESSION['purchases'][4]) ? "checked" : null; ?>><?php echo $aPurchases[4]?> </input>
      <br>
      <input type="checkbox" name="purchases[5]" <?php echo isSet($_SESSION['purchases'][5]) ? "checked" : null; ?>><?php echo $aPurchases[5]?> </input>
      <br>
      <input type="checkbox" name="purchases[6]" <?php echo isSet($_SESSION['purchases'][6]) ? "checked" : null; ?>><?php echo $aPurchases[6]?> </input>
      <br>
      <input type="checkbox" name="purchases[7]" <?php echo isSet($_SESSION['purchases'][7]) ? "checked" : null; ?>><?php echo $aPurchases[7]?> </input>
      <br><br>
	  <input type="submit" value="Previous" class="btn-lg btn-primary" name="previous" />
      <input type="submit" value="Next" class="btn-lg btn-primary"    name="submit" />
    </form>

    <?php

      function validate_buttons(){
	    $error_msg = array();
	    if(!isset($_POST['howPurchased'])){ 
	    	$error_msg[] = "No radio buttons were checked."; 	
	    }
	    else{
	    	$_SESSION['howPurchased'] = $_POST['howPurchased'];
	    }
    
	    if(!isset($_POST['purchases'])){ 
	    	$error_msg[] = "No checkboxes were checked."; 
	    }
	    else{
	    	echo $_POST['purchases'];
	    	$_SESSION['purchases'] = $_POST['purchases'];
	    }
	    return $error_msg;
      }
	?>
  </body>
</html>
