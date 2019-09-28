<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <title>
  Roos L Marie  Veebm Programmeerib</title>

</head>
<body><h1>Roos L Marie, veebiprogrammeerimine</h1>  <p>See veebileht on loodud õppetöö käigus ning ei sisalda mingit tõsiseltvõetavad sisu.</p>
  <hr>
  <h2>Vene filmid</h2>
  <p>Lisa uus film andmebaasi <p/>
  <hr>
  <form method="POST">
   <label>Kirjuta filmi pealkiri: </label>
   <input type="text" name="filmTitle">
   <br>
   <label>Filmi tootmisaasta: </label>
   <input type="number" min="1912" max="2019" value="2019" name="filmYear">
   <br>
   <label>Filmi kestus (min): </label>
   <input type="number" min="1" max="300" value="80" name="filmDuration">
   <br>
   <label>Filmi žanr: </label>
   <input type="text" name="filmGenre">
   <br>
   <label>Filmi tootja: </label>
   <input type="text" name="filmStudio">
   <br>
   <label>Filmi lavastaja: </label>
   <input type="text" name="filmDirector">
   <br>
   <input type="submit" value="Talleta filmi info" name="submitFilm">
  </form>
	
</body>
</html>