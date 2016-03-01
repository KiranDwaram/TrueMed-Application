<html>
<head>
	<meta name="viewport" content="width=device-width">
      <link href='https://fonts.googleapis.com/css?family=PT+Sans:400italic' rel='stylesheet' type='text/css'> 
      <link rel="stylesheet" href="../css/bootstrap.min.css">
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
	<div class="input-group col-md-offset-1" >  
      <input  type="submit" class="btn btn-default btn-md" value="BACK">
  </div>
</form>
	<h3>Insert Medicine </h3>
<form action="savedetails.php" method="POST">
	<div class="input-group col-md-9 col-md-offset-1">
      <input type="text" class="form-control"id="medname" name="medname" placeholder="Medicine Name" value="" /><br/>
   
     
      <input type="text" class="form-control"id="manuname" name="manuname" placeholder="ManuFaacturer Name"  value="" /><br/>
     
      <input type="text" class="form-control"id="category" name="category" placeholder="Category" value="" /><br/>
      <input type="text" class="form-control"id="pckgtype" name="pckgtype" placeholder="Package Type" value="" /><br/>
      <input type="text" class="form-control"id="pckgprice" name="pckgprice" placeholder="Package Price" value="" /><br/>
	  <input type="text" class="form-control" id="pckgqty" name="pckgqty" placeholder="Package Quantity"  value="" /><br/>
	  <input type="text" class="form-control" id="unitqty" name="unitqty" placeholder="Unit Quantity" value="" /><br/>
	  <input type="text" class="form-control" id="unittype" name="unittype" placeholder="Unit Type" value="" /><br/>
	  <input type="text" class="form-control"id="consname" name="consname" placeholder="Constituent Name " value="" /><br/>
	  <input type="text"  class="form-control"id="constrg" name="constrg" placeholder="Constituent Strength " value="" /><br/>
	  <input type="text" class="form-control"id="consqty" name="consqty" placeholder="Constituent Quantity" value="" /><br/>
	 
	</div>
	<div class="input-group col-md-offset-1">
	  <span class="input-group-btn">
		<input type="submit" class="btn btn-default btn-md" name="insert" id="insert" value="insert" />
		<input type="submit" class="btn btn-default btn-md" name="delete" id="delete" value="delete" />
	  </span>
  </div>
	<!-- Medicine Name : <input type="text" id="medname" name="medname" value="" /> <br/>
	ManuFaacturer Name : <input type="text" id="manuname" name="manuname" value="" /><br/>
	Category : <input type="text" id="category" name="category" value="" /><br/>
	Package Type : <input type="text" id="pckgtype" name="pckgtype" value="" /><br/>
	Package Price : <input type="text" id="pckgprice" name="pckgprice" value="" /><br/>
	Package Quantity : <input type="text" id="pckgqty" name="pckgqty" value="" /><br/>
	Unit Quantity : <input type="text" id="unitqty" name="unitqty" value="" /><br/>
	Unit Type: <input type="text" id="unittype" name="unittype" value="" /><br/>
	Constituent Name : <input type="text" id="consname" name="consname" value="" /><br/>
	Constituent Strength : <input type="text" id="constrg" name="constrg" value="" /><br/>
	Constituent Quantity<input type="text" id="consqty" name="consqty" value="" /><br/>
	<input type="submit" name="insert" id="insert" value="insert" /> -->
	
	
</form>
<br/>
<h3>Delete Medicine</h3>
<form action="savedetails.php" method="POST"<br/>
<div class="input-group col-md-9 col-md-offset-1">
	<input type="text" class="form-control" id="medname" placeholder="Medicine Name" name="medname" value="" /> <br/>
</div>
<div class="input-group col-md-offset-1">
	<span class="input-group-btn">
		<input type="submit" class="btn btn-default btn-md" name="delete" id="delete" value="delete" />
	</span>
 </div>
</form>
</body>
</html>