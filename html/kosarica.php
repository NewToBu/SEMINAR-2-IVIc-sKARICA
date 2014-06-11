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
<!--KORISNIK-->
<?php

session_start();

if(isset($_SESSION['pac'])){
	
	echo '<a href="odjava.php">Odjava</a>';
	
	echo  '<a> Dobrodošli, ' . $_SESSION['pac'] .'</a>';
}

else {
	
	echo '<a href="registracija.php">Registriraj se</a>
								<a href="login.html">Prijava</a>';
} 


?>


<!-- <a href="registracija.html">Registriraj se</a>
<a href="login.html">Prijava</a> -->


</div>

<div class="row prvo">

<div class="logoo column column-3">
<a href="index.php"><img src="../images/logo.png"></a>
</div>

<div class="trazilica column column-6">
<form action="ponuda.php" method="post">
<input type="text" id="search" name="search" placeholder=" Pretraži" />
<input  type="submit" value="Traži"> 
</form>
</div>
<!--KOSARICA BROJ-->
<?php

if(isset($_SESSION['neki'])){
	
	echo '<div class="brojPR column column-1"><p>'.count($_SESSION['neki']).'</p></div>';
}
else {
	echo '<div class="brojPR column column-1"><p>0</p></div>';}

?>	


<div class="kupi column column-2">
<!-- <img src="../images/kosarica.png"> 
<a href="kosarica.php">KUPI</a>-->

<!--KOŠARICA SLIKA-->
<?php


if(!empty($_SESSION["cart"]))
{
	echo '<a href="kosarica.php"><img src="../images/kosarica/puna.png"></a>';
}else{
	echo '<a href="kosarica.php"><img src="../images/kosarica/prazna.png"></a>';
}
?> 
</div>


</div>



</header>


<section class="gray-boxes row">

<div class="sadrzaj row">




<section class="proizvodi column column-9">



<h1>Vaša košarica:</h1>

<!--KOŠARICA-->

<?php




/* spajanje na bazu */
$current_url = base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$con=mysqli_connect("localhost","root","123","pisanica");
// provjera konekcije
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,"SET CHARACTER_SET 'utf8'");



if(!empty($_SESSION['cart'])){
	
	$sto = implode(',',$_SESSION['cart']);
	
	$ukupnaCijena=0;
	
	
	$result = mysqli_query($con,"SELECT * FROM proizvodi WHERE id IN ($sto) ");
	
	
	
	while($row = mysqli_fetch_array($result))
	{ 
		
		for ($i = 0; $i < count($_SESSION['neki']); $i++) {
			
			
			if($row['id']==$_SESSION['neki'][$i]['id']){
				$cijena=($_SESSION['neki'][$i]['kolicina'])*$row['cijena'];
				$kolicina=$_SESSION['neki'][$i]['kolicina'];
				
				
			}
		}
		
		
		$ukupnaCijena=$ukupnaCijena+$cijena;
		
		echo '<div class="proizvodiPO row">
			
												<div class="column column-3 slikaUKosarici">
													<a href="ponuda.php"><img src="'.$row['slika'].'"></a>
													</div>
													<div class="column column-4">
													<h3>'.$row['ime'].'</h3>
													<h3>Količina:&nbsp&nbsp'.$kolicina.'</h3>
														<h3>Cijena:&nbsp&nbsp<strong>'.$cijena.',00kn</strong></h3>
														
														</div>
														
														<a href="ukloni.php?taj='.$row['id'].'"><div class="buttonUkloni column column-3">
														<h3> Ukloni </h3>
												</div></a>
										
										</div>';
		
		
		
		
		
		
		
	}	
	
	
	echo '<div class="proizvodiUKL row">
	
							
									<a href="isprazni.php?ro=66"><div class="buttonUkloni2 column column-3">
									<h3> Isprazni </h3>
									</div></a>
								
								</div>';
	
	
	echo '
										<hr>
										<div class="proizvodiPO row">
										
										<div class="column column-3 slikaUKosarici">
										</div>
										<div class="column column-4">
										<h3>Ukupna cijena: '.$ukupnaCijena.',00kn</h3>
											</div>';
	
	
         $nar = session_encode();
	
	echo	'<form id = "pay" action = "narudba.php" method = "post">
	        <input type="hidden" name="narudba" value="'.$nar.'" />
             <button class="buttonKupi column column-3"><h3> Kupi </h3></button>
												</form>
																					
										
											
										</div>';
	
} else {
	
	
	echo '<h1>prazna :(</h1>';
}




mysqli_close($con);



?>





</section>

</div>


</section>


		<footer class="site-footer">
			<hr>
			<nav class="footer-navigation">
				<ul>
					<li><a href="kosarica.php">HR</a></li>
					<li><a href="kosarica-en.php">EN</a></li>
				</ul>
			</nav>
			<p>Copyright &copy; BraTom</p>
		</footer>
</body>
</html>