<!DOCTYPE html>
<html>
  <head>
     <link href='https://fonts.googleapis.com/css?family=PT+Sans:400italic' rel='stylesheet' type='text/css'> 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/style.css">
  </head>
<body>
<form action="addetails.php" >
      <input  type="submit" class="btn btn-default btn-md" value="BACK">
</form>

<?php
     if(isset($_POST['medname'])) {
  $medname = $_POST['medname'];
  }
  if(isset($_POST['manuname'])) {
  $manuname = $_POST['manuname'];
  }
  if(isset($_POST['pckgtype'])) {
  $pckgtype = $_POST['pckgtype'];
  }
  if(isset($_POST['pckgprice'])) {
  $pckgprice = $_POST['pckgprice'];
  }
  if(isset($_POST['pckgqty'])) {
  $pckgqty = $_POST['pckgqty'];
  }
  if(isset($_POST['unitqty'])) {
  $unitqty = $_POST['unitqty'];
  }
  if(isset($_POST['unittype'])) {
  $unittype = $_POST['unittype'];
  }
  if(isset($_POST['consname'])) {
  $consname = $_POST['consname'];
  }
  if(isset($_POST['constrg'])) {
  $constrg = $_POST['constrg'];
  }
  if(isset($_POST['consqty'])) {
  $consqty = $_POST['consqty'];
  }
  if(isset($_POST['category'])) {
  $category = $_POST['category'];
  }

   $con = new PDO("mysql:host=localhost; dbname=medicine_test",
					"root","");
	$con->setAttribute(PDO::ATTR_ERRMODE,
						PDO::ERRMODE_EXCEPTION);


   if(isset($_POST['insert']) && $_POST['insert']=="insert") {
   	   if($medname && $manuname && $pckgtype && $pckgprice && $unitqty && $unittype && $consname && $constrg && $consqty && $category && $pckgqty ){
             
             $query = "SELECT * from manufacturer where manufacturer_name=:manuname";
             $ps = $con->prepare($query);


	// Fetch matching row.
			$ps->execute(array(':manuname' => $manuname));
			$ps->setFetchMode(PDO::FETCH_ASSOC);
			$data = $ps->fetchAll();
      $manid;
			if(count($data) > 0) {
                  
                  //var_dump($data);
                  $manid = $data[0]['manufacturer_id'];
       }
			else {
                
                $query1 = "insert into manufacturer (manufacturer_name,street,city,zip,state,country) values (:manuname,'UNKNOWN','UNKNOWN','UNKNOWN','UNKNOWN','India')";
                $ps = $con->prepare($query1);


	// Fetch matching row.
                //print $manuname;
				$ps->execute(array(':manuname' => $manuname));
				//$ps->setFetchMode(PDO::FETCH_ASSOC);
				//$data = $ps->fetchAll();
				//print "id is".$con->lastInsertId();
        $manid= $con->lastInsertId();
			}
      $query2 = "insert into medicine (name,category,manufacturer_id,generic_id) values (:medname,:category, :manid,'12345')";
                   $ps = $con->prepare($query2);


  // Fetch matching row.
                  $ps->execute(array(':medname' => $medname,':category' => $category,':manid' => $manid));
                  
                  //$ps->setFetchMode(PDO::FETCH_ASSOC);
     
    // print "Inserted into medicine";             //$data = $ps->fetchAll();
      $medid= $con->lastInsertId();
      $query3= "insert into constituents (name,strength,qty,generic_id,medicine_id) values(:conname,:consth,:conqty,'12345',:medid)";
      $ps = $con->prepare($query3);
      

  // Fetch matching row.
      $ps->execute(array(':conname' => $consname,':consth' => $constrg,':conqty' => $consqty,':medid' => $medid));
     // print "Inserted into constituents";

      $query4 = "insert into metrics (pckg_qty,pckg_type,pckg_price,unit_qty,unit_type,medicine_id) values (:pckgqty,:pckgtype,:pckgprice,:unitqty,:unittype,:medid)";
      $ps = $con->prepare($query4);
      

  // Fetch matching row.
      $ps->execute(array(':pckgqty' => $pckgqty,':pckgtype' => $pckgtype,':pckgprice' => $pckgprice,':unitqty' => $unitqty,':unittype' => $unittype,':medid' => $medid));
      //print "Inserted into metrics";
      print "<h1>Successfully Inserted</h1>";

 }
   	   else
   	   {
   	   	print "<h1>Please Enter All Details</h1>";
   	   }
   }




   if(isset($_POST['delete']) && $_POST['delete']=="delete") {

          if(isset($_POST['medname'])) {

            $medname = $_POST['medname'];
          }

          $query = "SELECT medicine_id from medicine where medicine.name=:medname";
          $ps = $con->prepare($query);


  // Fetch matching row.
          $ps->execute(array(':medname' => $medname));
          $ps->setFetchMode(PDO::FETCH_ASSOC);
          $data = $ps->fetchAll();

          if(count($data) > 0) {
             
             $medid = $data[0]['medicine_id'];
             var_dump($medid);
             $query1 = "delete from metrics where medicine_id=:medid";
             $query2 = "delete from constituents where medicine_id=:medid";
             $query3 = "delete from medicine where medicine_id=:medid";
              $ps = $con->prepare($query1);
              $ps->execute(array(':medid' => $medid));
              //print "Deleted from metrics";
              $ps = $con->prepare($query2);
              $ps->execute(array(':medid' => $medid));
              //print "Deleted from constituents";
              $ps = $con->prepare($query3);
              $ps->execute(array(':medid' => $medid));
              //print "Deleted from medicine";
              print "<h1>Successfully Deleted.</h1>";
          }
          else {
            print "<h1>No medicine with given name</h1>";
          }


   }


?>

</body>
</html>