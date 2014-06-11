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
	 <a href="registracija-en.php">Register</a>
	 <a href="login-en.html">Login</a>
	 
	
	</div>
	 

  </header>
  
  
   <section class="gray-boxes row">
       <div class="logoo column column-3">
					<a href="index-en.php"><img src="../images/logo.png"></a>
				</div>
     
	  <div class="forma column column-7">
        
		<form action="registracija-en.php?reg=1" method="post">
            
            <p>Welcome! </br>
			Please, put text here!</p></br>
          <label for="ime">Name:</label></br>
          <input id="ime" type="text" name="name" /></br></br></br>
		  <label for="prezime">Lastname:</label></br>
          <input id="prezime" type="text" name="lastname" /></br></br>
		  <label for="korisnickoIme">Username:</label></br>
          <input id="korisnickoIme" type="text" name="username" /></br></br></br>
          <label for="lozinka">Password:</label></br>
          <input id="lozinka" type="password" name="password" /></br></br></br>
		  <label for="email">Email:</label></br>
          <input id="email" type="text" name="email" /></br></br></br>
		  <label for="mjesto">City:</label></br>
		  <input id="mjesto" type="text" name="place" /></br></br></br>
		  <label for="poštanski broj">Postal code:</label></br>
		  <input id="poštanski broj" type="text" name="postalnumber" /></br></br></br>
		  <label for="adresa">Address:</label></br>
		  <input id="adresa" type="text" name="address" /></br></br></br>
       
          <p><input type="submit" value="Register!" class="InputButton" /></p>
        </form>   

	</div>
	
	
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
								echo "<script type='text/javascript'>alert('Name can only contain letters.');
									  </script>";	
								}
						}
						if (!empty($_POST['lastname'])) {
							if (preg_match('/^[A-Za-z_-čćšđž]+$/', $_POST['lastname'])) {
								$prezime = $_POST['lastname'];
								}
								else{
									echo "<script type='text/javascript'>alert('Last name can only contain letters.');
										  </script>";	
								}
						}		
						if (!empty($_POST['password'])) {
							if(strlen($_POST['password'])<6){
							echo "<script type='text/javascript'>alert('password must be least 6 characters long.');
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
									echo "<script type='text/javascript'>alert('Invalid e-mail address.');
										  </script>";
										}
						}

						if (!empty($_POST['place'])) {
							if (preg_match('/^[A-Za-z_-čćšđž]+$/', $_POST['place'])) {
								$place = $_POST['place'];
								}
								else{
									echo "<script type='text/javascript'>alert('Place can only contain letters.');
										  </script>";	
								}
						
						}
						if (!empty($_POST['postalnumber'])) {
							if (preg_match('/^[0-9]+$/', $_POST['postalnumber'])) {
								$postalnumber = $_POST['postalnumber'];
								}
								else{
									echo "<script type='text/javascript'>alert('Postal code must be 5 digits long number.');
										  </script>";	
								}
						
						}
						if (!empty($_POST['address'])) {
								if (preg_match('/^[A-Za-z0-9,. čćšđž]+$/', $_POST['address'])) {
								$address = $_POST['address'];
								}
								else{
									echo "<script type='text/javascript'>alert('Invalid address.');
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
								echo "<script type='text/javascript'>alert('Sorry,that username is already taken.');
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
										  window.location='login-en.html';
										  alert('God for you');
									</script>";
									   
					}
						
			  }                    
			  else{
				 echo "<script type='text/javascript'>alert('All fields are required'); 
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