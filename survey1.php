<!-- 
	File:    survey1.php
	Purpose: Data from "Part 1" of the survey according to project instructions
	Authors: Barbara Bianca Zacchi
			 Millene Cesconetto
			 Olha Tymoshchuk 
-->
<html>
  <head>
  	<title> Survey - Part 1 </title>
  	<link rel="stylesheet" type="text/css" href="./css/style.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	 <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet">
</head>

  <?php 

	include "helper.php";


    if (!isSet($_SESSION['name'])) {
       $_SESSION['name'] = "";
	};
	
	if (!isSet($_SESSION['age'])) {
		$_SESSION['age'] = "";
	};
	if (!isSet($_SESSION['student'])) {
	  $_SESSION['student'] = "";
	};

	
	if (isset($_POST["previous"])) {
		header("Location: ./index.php");
	}

    if (isSet($_POST["submit"])) {
		$error_msg = validate_fields();
		if (count($error_msg) == 0){
			header("Location: ./survey2.php");
		} else { 
		  display_error($error_msg); 
		}
	}
  ?> 

  <body>
    <h1>SURVEY 1 PAGE</h1>
    <form method="POST" action="./survey1.php">

      <h3>Full Name:</h3>
        <input type="text" class="form-control" name="fullName" value="<?php  echo $_SESSION["name"]; ?>"/>
        <h3>Your age:</h3>
        <input type="number" class="form-control" name="age" value="<?php  echo $_SESSION["age"]; ?>"/>
        <h3>Are you a student?</h3>
        <select name="student" class="form-control">
          <option value="-1">----</option>
          <option value="2" <?php if($_SESSION['student']== "2"){ echo "selected";}?> >Yes, Full time</option>
      	  <option value="1" <?php if($_SESSION['student']== "1"){ echo "selected";}?>>Yes, Part time</option>
      	  <option value="0" <?php if($_SESSION['student']== "0"){ echo "selected";}?>>No</option>
        </select>
        <br><br>
		<input type="submit" value="Previous" class="btn-lg btn-primary" name="previous" />
        <input type="submit" value="Next" class="btn-lg btn-primary"    name="submit" />	
    </form>

	<?php 
      function validate_fields(){
		
		$error_msg = array();
		
  	    if (!isset($_POST['fullName'])){
		  $error_msg[] = "Name field not defined";
	    } else if(isset($_POST['fullName'])){
		  $name = trim($_POST['fullName']);
		  if (empty($name)){
			$error_msg[] = "The Name field is empty";
		  }else if(strlen($name) >  128){
			$error_msg[] = "The name field contains too many characters";
		  }else {
			$_SESSION['name'] = $_POST['fullName'];
	   	  }
	    }
	  
  	    if (isset($_POST['age'])){
		  $age = $_POST['age'];
		  if (empty($age)){
			$error_msg[] = "The age field is empty";
    	  }else if (!is_numeric($age)){//check if number
			$error_msg[] = "The age field should contain numbers only!";
		  } else if ($age <= 0){
			$error_msg[] = "Please, the age should be greater than 0!";
		  } else {
			$_SESSION['age'] = $_POST['age'];
		  }
	    }

        if ((isSet($_POST['student'])) && ($_POST['student']>=0)) { 
   		  $_SESSION['student'] = $_POST['student'];
	    }else {
		  $error_msg[] = "Please, select student!";	
	    }

		return $error_msg;
      } 
	  
    ?>

  </body>
</html>

