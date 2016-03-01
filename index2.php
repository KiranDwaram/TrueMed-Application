<!DOCTYPE  HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1">
    <title>Medicine</title>
    <meta name="viewport" content="width=device-width">
      <link href='https://fonts.googleapis.com/css?family=PT+Sans:400italic' rel='stylesheet' type='text/css'> 
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">

      <link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
        <!-- load jquery library -->
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <!-- load jquery ui js file -->
        <script src="js/jquery-ui.min.js"></script>

        <script type="text/javascript">
        $(function() {
            var availableTags = <?php include('autocomplete/autocomplete.php'); ?>;
            $("#medicine_name").autocomplete({
                source: availableTags,
                autoFocus:true
            });

            var manufacturer = <?php include('autocomplete/manufacturer_autocomplete.php'); ?>;
            $("#manufacturer_name").autocomplete({
                source: manufacturer,
                autoFocus:true
            });

            var constituents = <?php include('autocomplete/constituent_autocomplete.php'); ?>;
            $("#constituent_name").autocomplete({
                source: constituents,
                autoFocus:true
            });

            var categories = <?php include('autocomplete/category_autocomplete.php'); ?>;
            $("#category_name").autocomplete({
                source: categories,
                autoFocus:true
            });
        });
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
          <a class="navbar-brand" href="php/addetails.php"> Add or Delete medicine</a>
            
        </div>
        
      </div><!-- /.container-fluid -->
    </nav>
    <div class="container Fluid">
      <h3>Search  Medicine Details</h3>
      <form  method="post" action="php/medicine2.php"  id="medicine">
        <div class="input-group col-md-9">
          <input  type="text" class="form-control" name="medicinename" id="medicine_name" size="50" placeholder="Start typing medicine name">
          <span class="input-group-btn">
              <input  type="submit" class="btn btn-default btn-md" name="submit" value="Search">
          </span>
        </div>
        <div class="input-group col-md-offset-1" >  
          <input type="radio"  name="option" value="med_man">Get Manufacturer Details<br>
          <input type="radio"  name="option" value="med_cat">Get Category Details<br>
          <input type="radio"  name="option" value="med_con">Get Constituents<br>
          <input type="radio"  name="option" value="med_met">Get Metrics<br>
          <input type="radio"  name="option" value="med_rev">Get User Reviews<br>
          <input type="radio"  name="option" value="alternatives">Get Alternate Medicine details
        </div>
     </form>

     <form method="post" action="php/manufacturer.php" id="manufacturer">
        <h3>Medicines manufactured by Manufaturer</h3>
        <div class="input-group col-md-9">
          <input  type="text" class="form-control" name="manufacturer_name" id="manufacturer_name" size="50" placeholder="Start typing manufacturer name">
          <span class="input-group-btn">
              <input  type="submit" class="btn btn-default btn-md" name="submit" value="Search">
          </span>
        </div>
     </form>

     <form method="post" action="php/constituent.php" id="constituent">
        <h3>Search medicines by constituents</h3>
        <div class="input-group col-md-9">
          <input  type="text" class="form-control" name="constituent_name" id="constituent_name" size="50" placeholder="Start typing constituent name">
          <span class="input-group-btn">
              <input  type="submit" class="btn btn-default btn-md" name="submit" value="Search">
          </span>
        </div>
     </form>

     <form method="post" action="php/category.php" id="category">
        <h3>Search medicines by category</h3>
        <div class="input-group col-md-9">
          <input  type="text" class="form-control" name="category_name" id="category_name" size="50" placeholder="Start typing category name">
          <span class="input-group-btn">
              <input  type="submit" class="btn btn-default btn-md" name="submit" value="Search">
          </span>
        </div>
          
     </form>
      <br/>
      <br/>
      <a class="btn btn-default" href="index3.php">Click here for OLAP Operations</a>
    </div>

    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"></script>-->
  </body>
</html>
