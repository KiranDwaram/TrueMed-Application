<!DOCTYPE html>
<html>
  <head>
     <link href='https://fonts.googleapis.com/css?family=PT+Sans:400italic' rel='stylesheet' type='text/css'> 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/style.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src="http://code.highcharts.com/highcharts.js"></script>
      <script src="http://code.highcharts.com/highcharts-more.js"></script>
      <script src="http://code.highcharts.com/modules/exporting.js"></script>
     



    <script> 

    function generateGraph1(min_med_name,min_med_prc,max_med_name,max_med_prc,cur_med_name,cur_med_prc,count) {
      //console.log(min_med_name,min_med_prc,max_med_na=me,max_med_prc,cur_med_name,cur_med_prc);
      var text = "Medicine Name : " + cur_med_name + " Price :" +cur_med_prc;
      var text2 = "<br/>"+Number(count) + " alternatives available";
      $('#info').html(text+text2);
       Highcharts.setOptions({
             colors: [ '#24CBE5','#0066cc' ]
            });
        $('#chart').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Cheapest Generic Medicine substituent'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Medicine Cost',
                colorByPoint: true,
                data: [{
                    name: min_med_name,
                    y: Number(min_med_prc)
                }, {
                    name: max_med_name,
                    y: Number(max_med_prc),
                    sliced: true,
                    selected: true
                }]
            }]
        });
    }
    function generateGraph2(min_med_name,min_med_prc,cur_med_name,cur_med_prc) {
      //console.log(min_med_name,min_med_prc,max_med_na=me,max_med_prc,cur_med_name,cur_med_prc);
      /*var text = "Medicine Name : " + cur_med_name + " Price :" +cur_med_prc;
      var text2 = "<br/>"+Number(count) + " alternatives available";
      $('#info').html(text+text2);*/
       Highcharts.setOptions({
             colors: [ '#24CBE5','#0066cc' ]
            });
        $('#chart2').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Current Medicine to Cheapest Medicine comparision'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Medicine Cost',
                colorByPoint: true,
                data: [{
                    name: min_med_name,
                    y: Number(min_med_prc)
                }, {
                    name: cur_med_name,
                    y: Number(cur_med_prc),
                    sliced: true,
                    selected: true
                }]
            }]
        });
    }
    </script>

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

<div class="container-fluid">
  <h4 id="info"> </h4>

  </div>
 <div class="container-fluid col-md-5 col-md-offset-1" id="chart" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto">
 
  
 </div>
  <div class="container-fluid col-md-5 col-md-offset-1" id="chart2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto">
 
  
 </div>
<div class="data box effect1 container-fluid col-md-offset-1 col-md-10" >
  <!-- /*<script>
    function page(count){
      $('.table').pagination({
            items: count,
            itemsOnPage: 10,
            cssStyle: 'light-theme'
        });
    }
  </script>*/ -->

<?php

class Result
{

public function constructTable($data)
    {
            // We're going to construct an HTML table.
         print "    <table class='table'>\n";
            
         // Construct the HTML table row by row.
         $doHeader = true;
         foreach ($data as $row) {
         	  
             $row->iterate($doHeader);

          }
        
         print "    </table>\n";
    	
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

private $option = "";
private $medicineName;

public function setMedicineName($name)
{
	$this->medicineName=$name;
}

public function getMedicineName()
{
	return $this->medicineName;
}

public function setOption($option)
{
   $this->option = $option;
}

public function getOption()
{
	return $this->option;
}
public function validateMedicineEntry()
{
   if(empty($this->medicineName))
   {
      return false;
   }
   else
   {
   	return true;
   }
}
public function validateOption()
{
	if(empty($option))
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

    public function buildQuery($medicine_name,$option)
    {


	if(empty($option))
	{
		$this->query = $this->query."SELECT * from medicine where name=:name";
	}

	if($option=="med_man")
	{
        $this->query = $this->query."SELECT medicine.name as medicine_name,manufacturer.manufacturer_name FROM medicine, manufacturer WHERE medicine.name=:name and medicine.manufacturer_id = manufacturer.manufacturer_id ";
	}
	else if ($option == "med_cat") 
	{
		$this->query = $this->query."SELECT medicine.name as medicine_name,medicine.category as category_type FROM medicine WHERE medicine.name =:name";
	}
	else if ($option == "med_con") 
	{
		$this->query = $this->query."SELECT medicine.name as medicine_name,constituents.name as constituent_name FROM medicine,constituents WHERE medicine.name = :name and constituents.medicine_id = medicine.medicine_id ";
	}
	else if ($option == "med_met") 
	{
		$this->query = $this->query."SELECT medicine.name as medicine_name,metrics.pckg_type,metrics.pckg_price,metrics.pckg_qty,metrics.unit_qty,metrics.unit_type FROM medicine,metrics WHERE medicine.name=:name and metrics.medicine_id = medicine.medicine_id ";
	}
	else if ($option == "med_rev") 
	{
		$this->query = $this->query."SELECT medicine.name as medicine_name,reviews.rating, reviews.comments FROM medicine, reviews WHERE medicine.name=:name and reviews.medicine_id = medicine.medicine_id ";
	}
	else if ($option == "alternatives")
	{
        $this->query = $this->query."SELECT distinct(medicine.name) as medicine_name, pckg_price, pckg_qty, pckg_price/pckg_qty 
                from medicine,constituents,metrics 
                where medicine.medicine_id = constituents.medicine_id 
                and medicine.medicine_id=metrics.medicine_id 
                and constituents.name IN (select constituents.name 
                from constituents where medicine_id = (select medicine_id from medicine where medicine.name=:name))
                and constituents.strength IN(select constituents.strength from constituents where medicine_id = (select medicine_id from medicine where medicine.name=:name))
                GROUP BY medicine.name HAVING count(medicine.name)=(select count(constituents.name) from constituents where medicine_id = (select medicine_id from medicine where medicine.name=:name)) 
                order by pckg_price/pckg_qty";
	}
	

	return $this->query;
    }
}


try
{   

	$input = new Input();
	//$medicineName = $_POST['medicinename'];
    $input->setMedicineName($_POST['medicinename']);
	if(isset($_POST['option']))
	{
     	$input->setOption($_POST['option']);
    }
	if($input->validateMedicineEntry() == false)
	{
         throw new Exception("Please enter medicine name");
	}
	$name = $input->getMedicineName();
	$option = $input->getOption();

	/*if(empty($name))
	{
		throw new Exception("Please enter the medicine name.");	
	}*/


	//connect to the database

	$con = new PDO("mysql:host=localhost; dbname=medicine_test",
					"root","");
	$con->setAttribute(PDO::ATTR_ERRMODE,
						PDO::ERRMODE_EXCEPTION);
	
   
	$db = new Query();
	$query = $db->buildQuery($name,$option);

	$ps = $con->prepare($query);

	// Fetch matching row.
	$ps->execute(array(':name' => $name));
	$ps->setFetchMode(PDO::FETCH_CLASS, "Medicine");
	$data = $ps->fetchAll();

	
//fetch the price 
$query1 ="
select m.pckg_price/m.pckg_qty as per from medicine med, metrics m 
where m.medicine_id = med.medicine_id and name = :med_name;";
	$ps = $con->prepare($query1);

  // Fetch matching row.
  $ps->execute(array(':med_name' => $name));
  $ps->setFetchMode(PDO::FETCH_ASSOC);
  $data2 = $ps->fetchAll();
  //var_dump($data2);
  
  $cur_med_price = $data2[0]['per'];
  //print $cur_med_price;
  //query2
  $query3 ="SELECT distinct(medicine.name) as medicine_name, pckg_price, pckg_qty, pckg_price/pckg_qty 
  from medicine,constituents,metrics 
  where medicine.medicine_id = constituents.medicine_id 
  and medicine.medicine_id=metrics.medicine_id 
  and constituents.name IN (select constituents.name from constituents where medicine_id = 
    (select medicine_id from medicine where medicine.name=:name)) 
and constituents.strength IN(select constituents.strength from constituents where medicine_id = 
  (select medicine_id from medicine where medicine.name=:name)) 
GROUP BY medicine.name HAVING count(medicine.name)=(select count(constituents.name) from constituents where medicine_id = (select medicine_id from medicine where medicine.name=:name)) 
   order by pckg_price/pckg_qty desc limit 1";
   
   $ps = $con->prepare($query3);

  // Fetch matching row.
  $ps->execute(array(':name' => $name));
  $ps->setFetchMode(PDO::FETCH_ASSOC);
  $data3 = $ps->fetchAll();
  //var_dump($data3);
  $max_med_name = $data3[0]['medicine_name'];
  $max_med_price = $data3[0]['pckg_price/pckg_qty'];
  //print $max_med_price;
// cheap med

  $query4 ="SELECT distinct(medicine.name) as medicine_name, pckg_price, pckg_qty, pckg_price/pckg_qty 
  from medicine,constituents,metrics 
  where medicine.medicine_id = constituents.medicine_id 
  and medicine.medicine_id=metrics.medicine_id 
  and constituents.name IN (select constituents.name from constituents where medicine_id = 
    (select medicine_id from medicine where medicine.name=:name)) 
and constituents.strength IN(select constituents.strength from constituents where medicine_id = 
  (select medicine_id from medicine where medicine.name=:name)) 
GROUP BY medicine.name HAVING count(medicine.name)=(select count(constituents.name) from constituents where medicine_id = (select medicine_id from medicine where medicine.name=:name)) 
   order by pckg_price/pckg_qty limit 1";
   
   $ps = $con->prepare($query4);

  // Fetch matching row.
  $ps->execute(array(':name' => $name));
  $ps->setFetchMode(PDO::FETCH_ASSOC);
  $data4 = $ps->fetchAll();
  //var_dump($data4);
  $min_med_name = $data4[0]['medicine_name'];
  $min_med_price = $data4[0]['pckg_price/pckg_qty'];
  //print $min_med_price;
?>

<script language='javascript'> 
var min_med_name = "<?php echo $min_med_name ?>";
var min_med_prc = "<?php echo $min_med_price ?>";
var max_med_name = "<?php echo $max_med_name  ?>";
var max_med_prc = "<?php echo $max_med_price  ?>";
var cur_med_name = "<?php echo $name ?>";
var cur_med_prc = "<?php echo $cur_med_price ; ?>"; 
var count = "<?php echo count($data) ; ?>"; 

generateGraph1(min_med_name,min_med_prc,max_med_name,max_med_prc,cur_med_name,cur_med_prc,count)
generateGraph2(min_med_name,min_med_prc,cur_med_name,cur_med_prc)
</script>

<?php

	//data is an array
  
	if (count($data) > 0)
	{   
    print "<h4> Alternatives</h4>\n" ;

		//print count($data);
		$result = new Result();
		$result->constructTable($data);
		
  
	}
	
	else
	{
		print "<h3>(No Match.)</h3>\n";
	}
  ?>
<script>
var count = "<?php echo count($data) ; ?>"; 
page(count);
</script>
  <?php
	
}
catch(PDOException $ex){
	echo 'Error: '.$ex->getMessage();
}
catch(Exception $ex){
	echo 'Error: '.$ex->getMessage();
}

?>

</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"></script>
</body>
</html>