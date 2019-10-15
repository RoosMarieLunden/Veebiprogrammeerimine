<?php
require("../../../config_vp2019.php");
require("functions_user.php");
$database = "if19_roos_lun_1";
//kui pole sisseloginud
if(!isset($_SESSION["userID"])){
  //siis jõuga sisselogimise lehele
  header("Location: page.php");
  exit();
}

//väljalogimine
if(isset($_GET["logout"])){
  session_destroy();
  header("Location: page.php");
  exit();
}

$userName = $_SESSION["userFirstname"] ." " .$_SESSION["userLastname"];

require("header.php");
	
echo "<h1>" .$userName .", veebiprogrammeerimine</h1>";
?>
<p>See veebileht on loodud õppetöö käigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
<hr>
<br>
<p><?php echo $userName; ?> | Logi <a href="?logout=1">välja</a>!</p>
<ul>
  <li><a href="userprofile.php">Kasutajaprofiil</a></li>
</ul>

</body>
</html>