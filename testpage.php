<?php
require("../../../config_vp2019.php");
require("functions_main.php");
require("functions_user.php");
$database = "if19_roos_lun_1";
  
  $notice = "";
  $email = "";
  $emailError = "";
  $passwordError = "";
 
  $photoDir = "../photos/";
  $photoTypes = ["image/jpeg", "image/png"];
  
  $weekdayNamesET = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"];
  $monthNamesET = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
  $weekdayNow = date("N");
  $dateNow = date("d");
  $monthNow = date("m");
  $yearNow = date("Y");
  $timeNow = date("H:i:s");
  $fullTimeNow = date("d.m.Y H:i:s");
  $hourNow = date("H");
  $partOfDay = "hägune aeg";
  
  if($hourNow < 8){
	$partOfDay = "hommik";
  }
  if($hourNow >= 8 and $hourNow < 16){
		$partOfDay = "Sobiv aeg akadeemiliseks aktiivsuseks.";
	}
	if($hourNow >= 16 and $hourNow < 22){
		$partOfDay = "Vaba aeg.";
	}
	if($hourNow > 22){
		$partOfDay = "Uneaeg.";
	}
	
	//info semestri kulgemise kohta
	$semesterStart = new DateTime("2019-9-2");
	$semesterEnd = new DateTime("2019-12-13");
	$semesterDuration = $semesterStart -> diff($semesterEnd);
	$today = new DateTime("now");
	$fromSemesterStart = $semesterStart->diff($today);
	//echo $semesterDuration;
	//var_dump($semesterDuration);
	//<p>Semester on täies hoos:
    //<meter min="0" max="112" value="16">13%</meter>
	//</p>
	$semesterInfoHTML = "<p>Siin peaks olema info semestri kulgemise kohta!</p>";
	$elapsedValue = $fromSemesterStart->format("%r%a");
	$durationValue = $semesterDuration->format("%r%a");
	
	if($elapsedValue >= 0 and $elapsedValue <= $durationValue){
		$semesterInfoHTML = "<p>Semester on täies hoos: ";
		$semesterInfoHTML .= '<meter min="0" max="' .$durationValue .'" ';
		$semesterInfoHTML .= 'value="' .$elapsedValue .'">';
		$semesterInfoHTML .= round($elapsedValue / $durationValue * 100, 1) ."%";
		$semesterInfoHTML .="</meter>";
		$semesterInfoHTML .="</p>";
	}
	if($elapsedValue < 0){
		$semesterInfoHTML = "<p>Semester pole veel alanud.</p>";
	}
	if($elapsedValue > $durationValue){
		$semesterInfoHTML = "<p>Semester on läbi!</p>";
	}
	
	//foto näitamine lehel
	$allPhotos = [];
	$dirContent = array_slice(scandir($photoDir), 2);




	//$fileList = array_slice(scandir($photoDir), 2);
	//var_dump($fileList);
	//$photoList = [];
	foreach ($dirContent as $file){
		$fileInfo = getImagesize($photoDir .$file);
		//var_dump($fileInfo);
		if (in_array($fileInfo["mime"], $photoTypes)  == true){
			array_push($allPhotos, $file);
		}
	}
	
	
	//$photoList = ["tlu_terra_600x400_1.jpg", "tlu_terra_600x400_2.jpg", "tlu_terra_600x400_3.jpg"];//array ehk massiiv
	//var_dump($photoList);
	$photoCount = count($allPhotos);
	//echo $photoCount;
	$photoNum = mt_rand(0, $photoCount -1);
	//echo $photoList[$photoNum];
	$photoFile = $photoDir .$allPhotos[$photoNum];
	$randomImgHTML = '<img src="' .$photoFile .'" alt="TLÜ Terra õppehoone">';

	if(isset($_POST["login"])){
		if (isset($_POST["email"]) and !empty($_POST["email"])){
		  $email = test_input($_POST["email"]);
		} else {
		  $emailError = "Palun sisesta kasutajatunnusena e-posti aadress!";
		}
	  
		if (!isset($_POST["password"]) or strlen($_POST["password"]) < 8){
		  $passwordError = "Palun sisesta parool, vähemalt 8 märki!";
		}
	  
		if(empty($emailError) and empty($passwordError)){
		   $notice = signIn($email, $_POST["password"]);
		} else {
			$notice = "Ei saa sisse logida!";
		}
	  }
	

  ?>
  <!DOCTYPE html>
<html lang="et">
  <head>
    <meta charset="utf-8">
	<title>Katselise veebi uue kasutaja loomine</title>
  </head>
  <body>
  <body>
  <h1>Veebiprogrammeerimine</h1>

<p>See leht on loodud koolis õppetöö raames
ja ei sisalda tõsiseltvõetavat sisu!</p>
<?php
  echo $semesterInfoHTML;
?>

<hr>
<p>Lehe avamise hetkel oli aeg: 
<?php
  //echo $fullTimeNow;
  echo $weekdayNamesET[$weekdayNow - 1] .", " .$dateNow .". " .$monthNamesET[$monthNow - 1] ." " .$yearNow ." kell " .$timeNow;
?>
.</p>
<?php
  echo "<p>Lehe avamise hetkel oli " .$partOfDay .".</p>";
?>
<hr>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	  <label>E-mail (kasutajatunnus):</label><br>
	  <input type="email" name="email" value="<?php echo $email; ?>">&nbsp;<span><?php echo $emailError; ?></span><br>
	  
	  <label>Salasõna:</label><br>
	  <input name="password" type="password">&nbsp;<span><?php echo $passwordError; ?></span><br>
	  
	  <input name="login" type="submit" value="Logi sisse">&nbsp;<span><?php echo $notice; ?>
	</form>
  <hr>
  <p>loo <a href="newuser.php">kasutajakonto</a>!</p>
  <hr>
  <?php
    echo $randomImgHTML;
  ?>
</body>
</html>