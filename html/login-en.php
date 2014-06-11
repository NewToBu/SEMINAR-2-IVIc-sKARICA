<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>BraTom</title>

  <!-- Učitavanje stilskih datoteka -->
  <link rel="stylesheet" href="../css/normalize.css" />
  <link rel="stylesheet" href="../css/grid.css" />
  <link rel="stylesheet" href="../css/stil.css" />
 <link rel="shortcut icon" href="../images/lopta.ico">
  
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>





<body>
  <header class="site-header">
  
    <div class="login">
	 <a href="registracija.php">Registriraj se</a>
	 <a href="login.html">Prijava</a>
	 
	
	</div>
	 

  </header>
  
    <section class="gray-boxes row">
     
	  <div class="forma column column-7">
	  
	
				<form action="index.php" method="post">
					

				  <label for="ime">Korisničko ime:</label></br>
				  <input id="ime" type="text" name="username2" /></br></br></br>
				  <label for="lozinka">Lozinka:</label></br>
				  <input id="lozinka" type="password" name="password2" /></br></br></br>
			   
				  <p><input type="submit" value="Logiraj se" class="InputButton" /></p>
				</form>  
   
	</div>
  
  
   </section>
     
		<footer class="site-footer">
			<hr>
			<nav class="footer-navigation">
				<ul>
					<li><a href="index.php">HR</a></li>
					<li><a href="index-en.php">EN</a></li>
				</ul>
			</nav>
			<p>Copyright &copy; BraTom</p>
		</footer>
</body>
</html>