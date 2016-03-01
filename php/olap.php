<!DOCTYPE html>
<html>
<head>
   <link href='https://fonts.googleapis.com/css?family=PT+Sans:400italic' rel='stylesheet' type='text/css'> 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/style.css">
  </head>
<body>
  <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index2.php">TrueMed</a>
          
            
        </div>
        
      </div><!-- /.container-fluid -->
    </nav>
<form action="../index2.php" >
      <input  type="submit" class="btn btn-default btn-md" value="BACK">
</form>
<div class="data box effect1 container-fluid col-md-offset-1 col-md-10" >
<?php

class Result
{

public function constructTable($data)
    {
            // We're going to construct an HTML table.
          $doHeader = true;
          print "    <table class='table'>\n";
               foreach ($data as $row) {

                  if ($doHeader) {
                      print "        <tr>\n";
                     foreach ($row as $name => $value) {
                        print "            <th>$name</th>\n";
                             }
                                 print "        </tr>\n";
        
                               $doHeader = false;
                               }

                    print "            <tr>\n";

                    foreach ($row as $name => $value) {
                         print "                <td>$value</td>\n";
                    }

                    print "            </tr>\n";
               }
               print "</table>\n";
    	
    }

}
 class Medicine
 {
   private $medicine_name;
   private $manufacturer_name;
   private $category_type;
   private $constituent_name;
   private $pckg_type;
   private $pckg_price;
   private $pckg_qty;
   private $unit_qty;
   private $unit_type;
   private $rating;
   private $comments;
   
   public function getMedicineName()
   {   
        return $this->medicine_name;
   }
   public function getManufacturerName()
   {
   	    return $this->manufacturer_name;
   }
   public function getCategoryType()
   {
   	    return $this->category_type;
   }
   public function getConstituentName()
   {
   	    return $this->constituent_name;
   }
   public function getPackageType()
   {
   	    return $this->pckg_type;
   }
   public function getPackagePrice()
   {
   	    return $this->pckg_price;
   }
   public function getPackageQty()
   {
   	    return $this->pckg_qty;
   }
   public function getUnitQty()
   {
   	    return $this->unit_qty;
   }
   public function getUnitType()
   {
   	    return $this->unit_type;
   }
   public function getRating()
   {
   	    return $this->rating;
   }
   public function getComments()
   {
   	    return $this->comments;
   }
   public function getPercent()
   {
   		return ($this->pckg_price)/($this->pckg_qty);
   }

   public function getColumn($name)
   {    
   	    $value="";
      	switch($name){
      		case 'medicine_name': $value = $this->getMedicineName();
      		                      break;
      		case 'manufacturer_name': $value = $this->getManufacturerName();
      		                     break;
      		case 'category_type': $value = $this->getCategoryType();
      		                     break;
      		case 'constituent_name': $value = $this->getConstituentName();
      		                     break;
      		case 'pckg_type': $value = $this->getPackageType();
      		                     break;
      		case 'pckg_price': $value = $this->getPackagePrice();
      		                     break;
      		case 'pckg_qty': $value = $this->getPackageQty();
      		                     break;
      		case 'unit_type': $value = $this->getUnitType();
      		                     break;
      		case 'unit_qty': $value = $this->getUnitQty();
      		                     break;
      		case 'rating': $value = $this->getRating();
      		                     break;
      		case 'comments': $value = $this->getComments();
      		                     break;
      		case 'pckg_price/pckg_qty': $value = $this->getPercent();
                                 break;      		
              default:  print "in default";
      	}
      	return $value;
   }

   public function iterate(&$doHeader)
   {
             
            if ($doHeader) {
            	print "        <tr>\n";
                foreach ($this as $name => $value) {
                
                     if($value== NULL)
                     {
                       continue;
                     }
                     print "            <th>$name</th>\n";
                 }
                 print "        </tr>\n";
                 $doHeader = false;
             }
                
             // Data row.
             print "        <tr>\n";
             foreach ($this as $name => $value) {
                         if($value == NULL)
                         {
                            continue;
                         }
                 print "            <td>".$this->getColumn($name)."</td>\n";
             }
             print "        </tr>\n";
   }



 }

  	
class Input
{
    private $categoryName;

    public function setCategoryName($name)
    {
    	$this->categoryName=$name;
    }

    public function getCategoryName()
    {
    	return $this->categoryName;
    }


    public function validateCategoryEntry()
    {
       if(empty($this->categoryName))
       {
          return false;
       }
       else
       {
       	return true;
       }
    }

}

class Query
{
	private $query="";

    public function buildQuery($category_name)
    {

       $this->query = $this->query."SELECT category as category_type, name as medicine_name  from medicine where category = :name";
	
	     return $this->query;
    }
}


try
{   
  if(isset($_POST['medicine_name']))
  {
    $medicine_name = $_POST['medicine_name'];
  }
  if(isset($_POST['manufacturer_name']))
  {
    $manufacturer_name = $_POST['manufacturer_name'];
  }
  if(isset($_POST['year']))
  {
    $year = $_POST['year'];
  }
  if(isset($_POST['quarter']))
  {
    $quarter = $_POST['quarter'];
  }
    $query = "SELECT medicine.medicine_name, sum(production.unitsManufactured), manufacturer.manufacturer_name";
    $from = " FROM medicine, production, manufacturer ";
    $condition = " where medicine.medicineKey = production.medicineKey and manufacturer.ManufacturerKey = production.ManufacturerKey";
  if($medicine_name) {
    $condition .= " and medicine.medicine_name = :medicine_name";
  }
  if($year || $quarter) {
    $from .= ",calender";
    $condition .= " and calender.calenderKey = production.calenderKey";
  }
  if($year) {
    $query .= ",calender.year";
    
    $condition .= " and calender.year = :year";
  }
  if($quarter) {
    $query .= ",calender.quarter";
    
    $condition .= " and calender.quarter = :quarter";
  }

  if(empty($medicine_name)) {
    $condition .= " group by medicine.medicine_name";
  }

  $query = $query.$from.$condition;
  


	//connect to the database

	$con = new PDO("mysql:host=localhost; dbname=sample",
					"root","");
	$con->setAttribute(PDO::ATTR_ERRMODE,
						PDO::ERRMODE_EXCEPTION);
	
  //$db = new Query();
	//$query = $db->buildQuery($name);

	$ps = $con->prepare($query);

  
	// Fetch matching row.
  if($year && $quarter && !$medicine_name){
    $ps->execute(array(':year' => $year, ':quarter' => $quarter));
  }
  if($year && $medicine_name && !$quarter){
    $ps->execute(array(':year' => $year, ':medicine_name' => $medicine_name));
  }
  if($quarter && $medicine_name && !$year){
    $ps->execute(array(':quarter' => $quarter, ':medicine_name' => $medicine_name));
  }
  if($quarter && $medicine_name && $year){
    $ps->execute(array(':quarter' => $quarter, ':medicine_name' => $medicine_name,':year' => $year));
  }
  if($year && !$medicine_name && !$quarter){
    $ps->execute(array(':year' => $year));
  }
  if($quarter && !$year && !$medicine_name){
    $ps->execute(array(':quarter' => $quarter));
  }
  if($medicine_name && !$quarter && !$year){
    $ps->execute(array(':medicine_name' => $medicine_name));
  }
  else {
    $ps->execute();
  }

	
	$ps->setFetchMode(PDO::FETCH_ASSOC);
	$data = $ps->fetchAll();
  //data is an array of objects
	if (count($data) > 0)
	{   
		//print count($data);
		$result = new Result();
		$result->constructTable($data);
		
	}
	
	else
	{
		print "<h3>(No Match.)</h3>\n";
	}
	
}
catch(PDOException $ex){
	echo 'Error: '.$ex->getMessage();
}
catch(Exception $ex){
	echo 'Error: '.$ex->getMessage();
}

?>
</div>
</body>
</html>