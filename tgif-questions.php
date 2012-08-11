<?php

if(!session_id())
  session_start();

$_SESSION['quiz']++;

session_destroy();
var_dump($_SESSION);

//Connects to the Database 

 $username = 'root';
 $password = '';
 $hostname = 'localhost';
 $dbhandle = mysql_connect($hostname, $username, $password) or die("Unable to connect to MYSQL database");
 $selected = mysql_select_db("tgiq",$dbhandle) or die("Could not select TGIQ Database");



//Here is the TGIQ Class Code

 class tgiq 
 { 
   public function getcurrentquestion()
   {
     $currentquestion = $_SESSION['currentquestion'];
     $result = mysql_query("SELECT * from questions WHERE id = $currentquestion");
     while ($row = mysql_fetch_assoc($result)) 
     {
        
          return $row;
     }


   }

   public function savequestion($data)
   {
      $currentquestion = $this->getcurrentquestion();

      if($data['answers'] == $currentquestion['answer']) {
        $_SESSION['score']++;
        echo $_SESSION['score'];
      }
    
   }


 }
  
$var 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>The Great Independence Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">The Great Independence Quiz : TGIQ</a>
          <!--
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse --> 
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1><?php   echo $row['question']; ?></h1>

        <p>&nbsp;</p>
        
        <form class="form-horizontal">
		  <fieldset>
			<div class="control-group">
            <label class="control-label">Choose Answer : </label>
          <div class="controls">
              <label class="radio">
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                Option one is this and that&mdash;be sure to include why it's great
              </label>
              <label class="radio">
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                Option two can be something else and selecting it will deselect option one
              </label>
              <label class="radio">
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                Option one is this and that&mdash;be sure to include why it's great
              </label>
              <label class="radio">
              <input type="radio" name="optionsRadios" id="optionsRadios2" value="option1">
                Option two can be something else and selecting it will deselect option one
              </label>
              
          </div>
          <input type="submit" value="Next Questions" class="btn btn-primary btn-large"/>
		  </fieldset>
		</form>

      
        
      </div>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>

  </body>
</html>
