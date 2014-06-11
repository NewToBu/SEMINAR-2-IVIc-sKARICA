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

<!--PROVJERA ADMINA-->
<?php

session_start();

if((!empty($_GET['admin']))&&($_GET['admin']=='666')&&(isset($_SESSION['pac']))&&($_SESSION['pac']=='admin')){


	
	echo '<a href="odjava.php">Odjava</a>';
	
	echo  '<a> Dobrodošli, ' . $_SESSION['pac'] .'</a>';


/* else {
	
	echo '<a href="registracija.php">Registriraj se</a>
								<a href="login.html">Prijava</a>';
}  */

  											
}else{
echo "<script type='text/javascript'>
window.location='index.php';
</script>";
}

?>



</div>





</header>


<section class="gray-boxes row">

<div class="sadrzaj row">




<section class="proizvodi column column-9">



<h1>Naruđbe:</h1>

<!--NARUĐBE IZ BAZE-->

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



	
	
	$result = mysqli_query($con,"SELECT * FROM korisnici WHERE id>'49'");
	
	
	
	while($row = mysqli_fetch_array($result))
	{ 
		
	echo '<p>Naručitelj: <strong>'.$row['ime'].' '.$row['prezime'].'</strong></br>  Naruđba:</br><p class="ar">'.$row['narudba'].'</p></p>';
											
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
					<!-- <li><a href="kosarica.php">HR</a></li>
					<li><a href="kosarica-en.php">EN</a></li> -->
				</ul>
			</nav>
			<p>Copyright &copy; BraTom</p>
		</footer>
</body>
</html>