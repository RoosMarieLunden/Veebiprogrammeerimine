<?php
  $userName = "Roos L Marie";
  $fullTimeNow = date("d.m.Y. H:i:s");
  $hourNow = date("H");
  $partOfDay = "hägune aeg";
  
  if($hourNow < 8) {
	  $partOfDay = "hommik";
  } else if($hourNow > 8 && $hourNow < 10) {
    $partOfDay = "pärastlõuna";
  } else if($hourNow > 10) {
    $partOfDay = "öö";
  }
?>
<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <title>
  <?php
    echo $userName;
  ?>
  Veebm Programmeerib</title>

</head>
<body>
  <?php
    echo "<h1>" .$userName .", veebiprogrammeerimine</h1>";
  ?>
  <p>See veebileht on loodud õppetöö käigus ning ei sisalda mingit tõsiseltvõetavad sisu.</p>
  
  
  <hr>
  <?php
    echo "<p>Lehe avamise hetkel oli aeg: " .$fullTimeNow .", " .$partOfDay .".</p>";
	?>
</body>
</html>