<!-- 
	File:    index.php
	Purpose: Application home page
			 Welcome message and Instructions how to take the survey
	Authors: Barbara Bianca Zacchi
			     Millene L B S Cesconetto
			     Olha Tymoshchuk 
-->
<html>
  <head>
  	<title> Survey - Welcome </title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet">
  </head>


   <?php
     include "helper.php";
     if (isSet($_POST["start"])) {
       ClearSection($purchasesSelect);
		   header("Location: ./survey1.php");
	   }
   ?>

   <body>
     <h1>Hello User</h1>
     <p>Dear user,</p>
     <p>You are going to pass a survey about an electronic
        product, that you have recently used. Please, provide 
        the honest information through out the survey.</p>  

	 <form method="POST"  action="./index.php">
	   <input type="submit" class="btn-lg btn-primary" class="button" name="start" value="Start Survey" />
     </form>

    </body>
</html>
