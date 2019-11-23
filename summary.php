<!-- 
	File:    summary.php
	Purpose: Creating a table with search data saved in SessionGlobal.
	Authors: Barbara Bianca Zacchi
			     Millene L B S Cesconetto
			     Olha Tymoshchuk 
-->
<html>
  <head>
    <title> Summary</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet">
  </head>
  <?php

    include "helper.php";
    $PurchaseGlobal = GetArrayPurchaseGlobal($purchasesSelect,$aPurchases);
    
    if (isset($_POST["save"])) {
  	  header("Location: ./save.php");
    }

    if (isset($_POST["previous"])) {
  	  header("Location: ./survey3.php");
    }
    
  ?>
  <body>
    <table class="table table-bordered">
	  <tr class="bg-primary">
	  	<td class="bg-primary" colspan="2" align="Center">Sumary</td>
	  </tr>

      <tr class="bg-primary">
	  	<td colspan="2" align="Center">Part 1</td>
	  </tr>

	  <tr>
	  	<td>Ful Name</td>
	  	<td><?php  echo  GetNameGlobal()?></td>
	  </tr>
	  <tr>
	  	<td>Age</td>
	  	<td><?php  echo GetAgeGlobal(); ?></td>
  
	  </tr>
	  <tr>
		<td>Student</td>
        <td>
          <?php echo GetStudentGlobal();?> 
        </td>
	  </tr>

      <tr>
		<td class="bg-primary" colspan="2" align="Center">Part 2</td>
	  </tr>  
      <tr>
		<td>How Purchased</td>
		<td><?php  echo  GetHowPurchasedGlobal()?></td>
	  </tr>

      <tr>
		<td>Purchases</td>
        <td>
        <?php
          foreach($PurchaseGlobal as $v){
        ?>
		  <?php echo $v['value'] ; ?>
          <br>
        <?php } 
        ?>
        </td>
	  </tr>
    
      <tr>
	    <td class="bg-primary" colspan="2" align="Center">Part 3</td>
        <?php
          foreach($PurchaseGlobal as $v){
        ?>      
        <tr>
          <td colspan="2" align="Center"><?php echo $v['value'] ; ?></td> 
        </tr>  
        
        <tr>
	  	<td>Satisfaction</td>
          <td><?php echo $v['satisfaction'] ; ?></td>
	    </tr>
        <tr>
	  	<td>Recommend</td>
          <td><?php echo $v['recommend'] ; ?></td>
	    </tr> 
        <?php } 
        ?>
	  </tr>
    </table>
    <br>
    <form method="POST" action="summary.php">
      <input type="submit" value="Previous" class="btn-lg btn-primary" name="previous" />
      <input type="submit" value="Save" class="btn-lg btn-primary"   name="save" />
    </form>
  </body>
</html>