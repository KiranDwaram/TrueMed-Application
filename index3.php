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

            var manufacturer = <?php include('autocomplete/manufacturer_autocomplete1.php'); ?>;
            $("#manufacturer_name").autocomplete({
                source: manufacturer,
                autoFocus:true
            });

            /*var year = <?php include('year_autocomplete.php'); ?>;
            $("#year").autocomplete({
                source: year,
                autoFocus:true
            });

            var month = <?php include('month_autocomplete.php'); ?>;
            $("#month").autocomplete({
                source: month,
                autoFocus:true
            });*/
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
          
            
        </div>
        
      </div><!-- /.container-fluid -->
    </nav>
    <div class="container Fluid">
      <h3>OLAP Operations</h3>
    <form method="post" action="php/olap.php" id="olap">
      <h3>Analyze by Medicine Name</h3>
      <div class="input-group col-md-9">
        
       <input  type="text" name="medicine_name" id="medicine_name" class="form-control" size="50" placeholder="Start typing medicine name">
        
        <label for="year">Year</label><select name="year" id = "year">
            <option value=""></option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
        </select><br>

        <label for="quarter">Quarter</label><select name="quarter" id="Quarter">
            <option value="">All Quarters</option>
            <option value="Q1">Q1</option>
            <option value="Q2">Q2</option>
            <option value="Q3">Q3</option>
            <option value="Q4">Q4</option>
        </select><br>

        
        <input  type="submit" name="submit" class="btn btn-default btn-md" value="Search"><br/> <br/> 
    </div>
   </form>
   </div>

   <div class="container Fluid">
     
    <form method="post" action="php/olap1.php" id="olap">
      <h3>Analyze by Manufacturer Name</h3>
      <div class="input-group col-md-9">
        <input  type="text" name="manufacturer_name" id="manufacturer_name" class="form-control" size="50" placeholder="Start typing manufacturer name">
        
        <label for="year">Year</label><select name="year" id = "year">
            <option value=""></option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
        </select><br>

        <label for="quarter">Quarter</label><select name="quarter" id = "quarter">
            <option value="">All Quarters</option>
            <option value="Q1">Q1</option>
            <option value="Q2">Q2</option>
            <option value="Q3">Q3</option>
            <option value="Q4">Q4</option>
        </select><br>

        
        
        <input  type="submit" name="submit" class="btn btn-default btn-md" value="Search"><br/> <br/> 
    </div>
   </form>
   </div>
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"></script>-->
  </body>
</html>
