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
<!--      <a href="index.php">Početna</a> -->
	  <div class="logoo column column-3">
					<a href="index.php"><img src="../images/logo.png"></a>
				</div>
     
	  <div class="forma column column-7">
        <!--FORMA ZA REGISTRACIJU-->
		<form action="registracija.php?reg=1" method="post">
            
            <p>Dobrodošli! </br>
			Molimo ispunite obrazac za registraciju!</p></br>
          <label for="ime">Ime:</label></br>
          <input id="ime" type="text" name="name" /></br></br></br>
		  <label for="prezime">Prezime:</label></br>
          <input id="prezime" type="text" name="lastname" /></br></br>
		  <label for="korisnickoIme">Željeno ime:</label></br>
          <input id="korisnickoIme" type="text" name="username" /></br></br></br>
          <label for="lozinka">Lozinka:</label></br>
          <input id="lozinka" type="password" name="password" /></br></br></br>
		  <label for="email">Email:</label></br>
          <input id="email" type="text" name="email" /></br></br></br>
		  <label for="mjesto">Mjesto:</label></br>
		  <input id="mjesto" type="text" name="place" /></br></br></br>
		  <label for="poštanski broj">Poštanski broj:</label></br>
		  <input id="poštanski broj" type="text" name="postalnumber" /></br></br></br>
		  <label for="adresa">Adresa:</label></br>
		  <input id="adresa" type="text" name="address" /></br></br></br>
       
          <p><input type="submit" value="Registriraj se!" class="InputButton" /></p>
        </form>   

	</div>
	
	<!--ISPITIVANJE UNOSA I SPREMANJE U BAZU-->
		<?php 
		/*  echo "<script type='text/javascript'>alert('Molimo popunite sve podatke');
							  window.location='registracija.php';
							   </script>"; */
		if(isset($_GET['reg'])){
					
						if (!empty($_POST['name'])) {
							if (preg_match('/^[A-Za-z_-čćšđž]+$/', $_POST['name'])) {
								$ime = $_POST['name'];
							}
							else{
								echo "<script type='text/javascript'>alert('Ime može sadržavati samo slova');
									  </script>";	
								}
						}
						if (!empty($_POST['lastname'])) {
							if (preg_match('/^[A-Za-z_-čćšđž]+$/', $_POST['lastname'])) {
								$prezime = $_POST['lastname'];
								}
								else{
									echo "<script type='text/javascript'>alert('Prezime može sadržavati samo slova');
										  </script>";	
								}
						}		
						if (!empty($_POST['password'])) {
							if(strlen($_POST['password'])<6){
							echo "<script type='text/javascript'>alert('password mora sadržavati bar 6 znakova');
										  </script>";
							}
							else{
							$lozinka=$_POST['password'];
							}
						
						}						
						if (!empty($_POST['email'])) {
								$mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
							if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
								 $email=$mail;
								} else {					
									echo "<script type='text/javascript'>alert('molimo unesite ispravnu e-mail adresu');
										  </script>";
										}
						}

						if (!empty($_POST['place'])) {
							if (preg_match('/^[A-Za-z_-čćšđž]+$/', $_POST['place'])) {
								$place = $_POST['place'];
								}
								else{
									echo "<script type='text/javascript'>alert('Mjesto može sadržavati samo slova');
										  </script>";	
								}
						
						}
						if (!empty($_POST['postalnumber'])) {
							if (preg_match('/^[0-9]+$/', $_POST['postalnumber'])) {
								$postalnumber = $_POST['postalnumber'];
								}
								else{
									echo "<script type='text/javascript'>alert('Poštanski broj mora biti sastavljen od slova');
										  </script>";	
								}
						
						}
						if (!empty($_POST['address'])) {
								if (preg_match('/^[A-Za-z0-9,.čćšđž]+$/', $_POST['address'])) {
								$address = $_POST['address'];
								}
								else{
									echo "<script type='text/javascript'>alert('Neispravna adresa');
										  </script>";	
								}
						
						}
						
					
						$Kime = $_POST['username'];
		
			  
			  if(!empty($ime)&&!empty($prezime)&&!empty($Kime)&&!empty($lozinka)&&!empty($email)&&!empty($place)&&!empty($postalnumber)&&!empty($address)) { 
			  
					$con=mysqli_connect("localhost","root","123","pisanica");
						// provjera konekcije
					if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
					
					mysqli_query($con,"SET NAMES 'utf8'");
					mysqli_query($con,"SET CHARACTER_SET 'utf8'");						

					$query = "SELECT * FROM korisnici";
					$result = mysqli_query($con,$query);
					$postoji = 0;
					 while ($row = mysqli_fetch_array($result)) {

						if( strcmp($row['korisnickoIme'],$Kime) == 0){
								$postoji = 1;
								echo "<script type='text/javascript'>alert('korisnicko ime je zauzeto');
											  </script>";
								break;
						}
					}
					if($postoji == 0){
					    $passwordHash = sha1($_POST['password']);
						$query = "INSERT INTO korisnici(ime,prezime, korisnickoIme,sifra,email,mjesto,postBr,adresa) VALUES ('$ime','$prezime','$Kime','$passwordHash','$email','$place','$postalnumber','$address')";
						$result = mysqli_query($con, $query);
						mysqli_close($con);

							   echo "<script type='text/javascript'>
										  window.location='login.html';
										  alert('Uspješno ste se registrirali');
									</script>";
									   
					}
						
			  }                    
			  else{
				 echo "<script type='text/javascript'>alert('Molimo popunite sve podatke'); 
					   </script>";
			 }
			
			}
			?>

   </section>
   
   
		<footer class="site-footer">
			<hr>
			<nav class="footer-navigation">
				<ul>
					<li><a href="registracija.php">HR</a></li>
					<li><a href="registracija-en.php">EN</a></li>
				</ul>
			</nav>
			<p>Copyright &copy; BraTom</p>
		</footer>
</body>
</html>