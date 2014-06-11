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
<!--SLIDER-->
	<script language="JavaScript1.1">

		var slideimages=new Array()
		var slidelinks=new Array()
		function slideshowimages(){

			for (i=0;i<slideshowimages.arguments.length;i++){
				slideimages[i]=new Image()
				slideimages[i].src=slideshowimages.arguments[i]
			}
		}

		function slideshowlinks(){
			for (i=0;i<slideshowlinks.arguments.length;i++)
			slidelinks[i]=slideshowlinks.arguments[i]
		}

		function gotoshow(){
			if (!window.winslide||winslide.closed)
			winslide=window.open(slidelinks[whichlink],"_self")
			else
			winslide.location=slidelinks[whichlink]
			winslide.focus()
		}

	</script>



	<body>
		<header class="site-header">

			<div class="login">
<!--PROVJERA KORISNIKA-->
				<?php  
 
					session_start();
					

										if(!empty($_POST['username2'])&&!empty($_POST['password2']))

										{
											

													$br=0;
													
													$con=mysqli_connect("localhost","root","123","pisanica");
													// provjera konekcije
													if (mysqli_connect_errno())
													{
														echo "Failed to connect to MySQL: " . mysqli_connect_error();
													}
													
													
													mysqli_query($con,"SET NAMES 'utf8'");
													mysqli_query($con,"SET CHARACTER_SET 'utf8'");
													
													$passwordHash = sha1($_POST['password2']);
													
													/* povlače se podaci iz baze */
													$result = mysqli_query($con,"SELECT * FROM korisnici");
													/* ime odredišta koje je kliknuto se traži u bazi i ispisuje se određeni sadržaj */
													while($row = mysqli_fetch_array($result))
													{ 
														
														
														if($_POST['username2']==$row['korisnickoIme'] && $passwordHash==$row['sifra']){
															
															$br=1;
															
														} 
														
													} 
													
													if($br){
														
														if($_POST['username2']=='admin'){
														$_SESSION['pac'] =  $_POST['username2'];
														echo "<script type='text/javascript'>alert('Dobrodošli admin');
																				window.location='admin.php?admin=666';
																				</script>";
														
														}else{
														echo    '<a href="odjava.php">Odjava</a>';
														echo '<a> Dobrodošli, ' . $_POST['username2'] .'</a>';
														
														
														$_SESSION['pac'] =  $_POST['username2'];	
														}
													}
													else {
														
														
														echo "<script type='text/javascript'>alert('Nepostojeće ime ili kriva lozinka');
																				window.location='login.html';
																				</script>";
														

													}

													
													mysqli_close($con);
													
													
													
										} else if(!empty($_POST['username2'])||!empty($_POST['password2'])){
									
											echo "<script type='text/javascript'>alert('Niste sve unjeli');
																				window.location='login.html';
																				</script>";
										}

										else {
											
													if(isset($_SESSION['pac'])){
														
														echo    '<a href="odjava.php">Odjava</a>';
														
														echo  '<a> Dobrodošli, ' . $_SESSION['pac'] .'</a>';
													}
													
													else {
														
														echo '<a href="registracija.php">Registriraj se</a>
																				
																				<a href="login.html">Prijava</a>';
																				
																				
													}
											
										}				

                    

				?>

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

				<?php

					if(isset($_SESSION['neki'])){
						
						echo '<div class="brojPR column column-1"><p>'.count($_SESSION['neki']).'</p></div>';
					}
					else {
						echo '<div class="brojPR column column-1"><p>0</p></div>';}
				?>			 

				<div class="kupi column column-2">
					<!-- <img src="../images/kosarica.png"> 
					/* <a href="kosarica.php"></a> */-->


					<?php

						/* echo '<div class="brojPR column column-1"><p>'.count($_SESSION['neki']).'</p></div>'; */

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

		<section class="intro">
			<div class="row">


				<div class="slike"> 
					<a href="javascript:gotoshow()"><img src="images/black.jpg" name="slide" ></a>
					<!--  <div class="kupi">
					<a href="katalog.html">Katalog čajeva</a> 

					</div> -->

					<script>

						slideshowimages("../images/Proizvodi/Muška/Majice/1.png","../images/Proizvodi/Muška/Hlače/1.png","../images/Proizvodi/Muška/Kupaći/1.png","../images/Proizvodi/Ženska/Majice/1.png","../images/Proizvodi/Ženska/Hlače/1.png","../images/Proizvodi/Ženska/Kupaći/1.png","../images/Proizvodi/Obuća/Japanke/1.png","../images/Proizvodi/Obuća/Kroksice/1.png","../images/Proizvodi/Ronilačka/Maske/1.png","../images/Proizvodi/Ronilačka/Peraje/1.png","../images/Proizvodi/Igračke/Pijesak/1.png","../images/Proizvodi/Igračke/Luftići/1.png","../images/Proizvodi/Dodaci/Suncobrani/1.png","../images/Proizvodi/Dodaci/Naočale/1.png","../images/Proizvodi/Dodaci/Šeširi/1.png","../images/Proizvodi/Dodaci/Ručnici/1.png")
						slideshowlinks("ponuda.php?cat=1","ponuda.php?cat=2","ponuda.php?cat=3","ponuda.php?cat=4","ponuda.php?cat=5","ponuda.php?cat=6","ponuda.php?cat=7","ponuda.php?cat=8","ponuda.php?cat=9","ponuda.php?cat=10","ponuda.php?cat=11","ponuda.php?cat=12","ponuda.php?cat=13","ponuda.php?cat=14","ponuda.php?cat=15","ponuda.php?cat=16")


						var slideshowspeed=3500

						var whichlink=0
						var whichimage=0



						function slideit(){

							if (!document.images)
							return
							document.images.slide.src=slideimages[whichimage].src
							whichlink=whichimage
							if (whichimage<slideimages.length-1)
							whichimage++
							else
							whichimage=0
							setTimeout("slideit()",slideshowspeed)
						}
						slideit()


					</script> 



				</div>
				<h1 class="k">Naši proizvodi </h1>

			</div>





		</section>



		<section class="gray-boxes row">

			<section class="proizvodi column column-12"> 
				<h1>Najprodavaniji proizvodi:</h1>


<!--NAJPRODAVANIJI PROIZVODI-->
				<?php

					/*  session_start(); */

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

					/* povlače se podaci iz baze */


					$result = mysqli_query($con,"SELECT * FROM proizvodi WHERE id IN (2,18,19,24) ");

					/* ime odredišta koje je kliknuto se traži u bazi i ispisuje se određeni sadržaj */


					while($row = mysqli_fetch_array($result))
					{ 
						
						
						echo '<div class="stvar column column-3">'
						.'<form method="post" action="proba.php">'
						.'<h3 class="ime">'.$row['ime'].'</h3>'
						.'<a href="ponuda.php"><img src="'.$row['slika'].'"></a><p>'.$row['opis'].'</p>'
						.'<h4 class="cijena">Cijena:&nbsp&nbsp&nbsp&nbsp<strong>'.$row['cijena'].',00kn</strong></h4>'
						.'<h4 class="boja">Boja:&nbsp&nbsp&nbsp&nbsp
																		<select name="boja">
																			<option value="1">Plava</option>
																			<option value="2">Crvena</option>
																			<option value="3">Žuta</option>
																			<option value="4">Zelena</option>
																			<option value="5">Narančasta</option>
																			<option value="6">Ljubičasta</option>
																			<option value="7">Bijela</option>
																			<option value="8">Crna</option>
																		</select>
														</h4>';
						
						if(($row['vrsta']==7)||($row['vrsta']==8))	{
							echo '<h4 class="broj">Broj noge:&nbsp&nbsp&nbsp&nbsp
															<select name="broj">
															<option value="1">16</option>
															<option value="2">17</option>
															<option value="3">18</option>
															<option value="4">19</option>
															<option value="5">20</option>
															<option value="6">21</option>
															<option value="7">22</option>
															<option value="8">23</option>
															<option value="9">24</option>
															<option value="10">25</option>
															<option value="11">26</option>
															<option value="12">27</option>
															<option value="13">28</option>
															<option value="14">29</option>
															<option value="15">30</option>
															<option value="16">31</option>
															<option value="17">32</option>
															<option value="18">33</option>
															<option value="19">34</option>
															<option value="20">35</option>
															<option value="21">36</option>
															<option value="22">37</option>
															<option value="23">38</option>
															<option value="24">39</option>
															<option value="25">40</option>
															<option value="26">41</option>
															<option value="27">42</option>
															<option value="28">43</option>
															<option value="29">44</option>
															<option value="30">45</option>
															</select>
														</h4>';
							
						} else {
							echo '<h4 class="velicina">Veličina:&nbsp&nbsp&nbsp&nbsp
																<select name="velicina">
																<option value="1">XS</option>
																<option value="2">S</option>
																<option value="3">M</option>
																<option value="4">L</option>
																<option value="5">XL</option>
																<option value="6">XXL</option>
																</select>
															</h4>';
						}
						
						echo '<h4 class="kolicina">Količina:&nbsp&nbsp&nbsp&nbsp
																<select name="kolicina">
																<option value="1">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
																<option value="4">4</option>
																<option value="5">5</option>
																<option value="6">6</option>
																<option value="7">7</option>
																<option value="8">8</option>
																<option value="9">9</option>
																<option value="10">10</option>
																</select>
															</h4>';	 
						
						echo	  '<button class="dodaj">Dodaj u košaricu</button>'
						.'<input type="hidden" name="id" value="'.$row['id'].'" />'   
						.'<input type="hidden" name="return_url" value="'.$current_url.'" />'
						.'</form>'
						.'</div>';
						

						
					}

					mysqli_close($con);
				?>



			</section>
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