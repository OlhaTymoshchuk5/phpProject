<!-- 
    File: save.php
    Purpose: Save all datas in Database
    Authors: Barbara Bianca Zacchi
    	     Millene Cesconetto
    	     Olha Tymoshchuk 
-->
<html>
  <head>
  	<title> Survey - Save </title>
  </head>

  <?php
    require_once("./db_connection.php");
    include "helper.php";

    $db_conn = connectDB();
    $error_msg = array();    

    //Save participants
    $stmt = $db_conn->prepare("insert into participants (part_fullname, part_age, part_student) values (:name, :age, :student)");
    if (!$stmt){
       echo "Error ".$dbc->errorCode()."\nMessage ".implode($dbc->errorInfo())."\n";
      exit(1);
    } 
    
    $name = GetNameGlobal();
    $age  = GetAgeGlobal();
    $student = GetStudentGlobalChar();
    $data = array(":name" => $name, ":age" => $age, ":student" => $student);
    $status = $stmt->execute($data);

    if(!$status) {
        echo "Error ".$stmt->errorCode()."\nMessage ".implode($stmt->errorInfo())."\n";
        exit(1);
	} else {
        //Save responses

        $sql = 'SELECT MAX(part_id) as id FROM participants';
        foreach ($db_conn->query($sql) as $row) {
           $resp_part_id = $row['id'];
        }
        if ($resp_part_id > 0){
            $stmt = $db_conn->prepare("insert into responses(resp_part_id, resp_product, resp_how_purchased, resp_satisfied,resp_recommend) values (:resp_part_id, :resp_product, :resp_how_purchased, :resp_satisfied, :resp_recommend)");
            if (!$stmt){
              echo "Error ".$dbc->errorCode()."\nMessage ".implode($dbc->errorInfo())."\n";
              exit(1);
            } 
            $resp_how_purchased = GetHowPurchasedGlobal(); 
            $PurchaseGlobal = GetArrayPurchaseGlobal($purchasesSelect,$aPurchases);
            foreach($PurchaseGlobal as $v){
              $resp_product   = $v['value'];
              $resp_satisfied = $v['satisfaction'];
              $resp_recommend = $v['recommend'];

              $data = array(":resp_part_id" => $resp_part_id, ":resp_product" => $resp_product, ":resp_how_purchased" => $resp_how_purchased,":resp_satisfied"  => $resp_satisfied, ":resp_recommend" => $resp_recommend);
              $status = $stmt->execute($data);       
              if(!$status) {
                $error_msg[] = "Error ".$stmt->errorCode()."\nMessage ".implode($stmt->errorInfo())."\n";
              }
            }
        }
    }        
  ?>

  <h2> 
    <?php 
      if (count($error_msg) == 0){
          echo "Thank you for participating in our survey!";
      } else {
          display_error($error_msg); 
      }
    ?>
  </h2>

</html>