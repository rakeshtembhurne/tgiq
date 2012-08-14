<?php

if(!session_id())
    session_start();

if (empty($_SESSION['currentQuestion'])) {
    $_SESSION['currentQuestion'] = 1;
}

//Connects to the Database 
$username = 'root';
$password = 'root';
$hostname = 'localhost';
$dbhandle = mysql_connect($hostname, $username, $password) or die("Unable to connect to MYSQL database");
$selected = mysql_select_db("tgiq",$dbhandle) or die("Could not select TGIQ Database");

function debug($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

//Here is the TGIQ Class Code
class Tgiq
{
    public function getCurrentQuestion()
    {
        $currentQuestion = $_SESSION['currentQuestion'];
        $result = mysql_query("SELECT * from questions WHERE id = $currentQuestion");
        while ($row = mysql_fetch_assoc($result)) 
        {
            return $row;
        }
    }

    public function saveQuestion($data)
    {
        $currentQuestion = $this->getCurrentQuestion();

        if($data['answer'] == $currentQuestion['answer']) {
            $_SESSION['userAnswers'][$data['question_number']] = $currentQuestion['answer'];
            //$_SESSION['score']++;
            $_SESSION['currentQuestion']++;
        }        
    }
}


$tgiq  = new Tgiq();
$error = null;

debug($_POST);
debug($_SESSION['userAnswers']);
// Saved question if submitted
if (!empty($_POST)) {
    if (!empty($_POST['question_number']) AND !empty($_POST['answer'])) {
        $tgiq->saveQuestion($_POST);
    } else {
        $error = 'An answer must be selected.';
    }
}
$currentQuestion = $tgiq->getCurrentQuestion();

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
      <?php if (!empty($error)): ?>
          <div class="alert alert-error"><?php echo $error; ?></div>
      <?php endif; ?>
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1><?php echo $currentQuestion['question']; ?></h1>

        <p>&nbsp;</p>
        
        <form method="POST" class="form-horizontal">
            <input type="hidden" name="question_number" value="<?php echo $currentQuestion['id'] ?>" />
		  <fieldset>
			<div class="control-group">
            <label class="control-label">Choose Answer : </label>
          <div class="controls">
              <label class="radio">
                <input type="radio" name="answer" value="1" />
                <?php echo $currentQuestion['option_1']?>
              </label>
              <label class="radio">
                <input type="radio" name="answer" value="2" />
                <?php echo $currentQuestion['option_2']?>
              </label>
              <label class="radio">
                <input type="radio" name="answer" value="3" />
                <?php echo $currentQuestion['option_3']?>
              </label>
              <label class="radio">
              <input type="radio" name="answer" value="4" />
                <?php echo $currentQuestion['option_4']?>
              </label>
          </div>
          <?php if ($currentQuestion['id'] >= 15): ?>
              <input type="submit" value="Jai Hind!" class="btn btn-success btn-large"/>
          <?php else: ?>
              <input type="submit" value="Next Questions" class="btn btn-primary btn-large"/>
          <?php endif; ?>
          
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
