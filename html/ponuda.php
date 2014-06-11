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
	<!--kORISNIK-->
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
	
	
	<!--  <a href="registracija.html">Registriraj se</a>
	 <a href="index.html">Prijava</a> -->
	 
	
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
	    <a href="kosarica.php">KUPI</a>-->
		
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

  <!--IZBOR-->
  <div class="sadrzaj row">
  
  
      <div class="asidebar column column-3">
 <nav class="leftMenu">
  <div class="menu-item">
    <h4><a href="ponuda.php?cat=M">Muška odjeća</a></h4> 
    <ul> 
      <li><a href="ponuda.php?cat=1">Muške majice</a></li>
	  <li><a href="ponuda.php?cat=2">Muške hlače</a></li>
	  <li><a href="ponuda.php?cat=3">Muški kupaće</a></li>
    </ul>
  </div>
  <div class="menu-item">
    <h4><a href="ponuda.php?cat=Z">Ženska odjeća</a></h4> 
    <ul> 
      <li><a href="ponuda.php?cat=4">Ženske majice</a></li>
	  <li><a href="ponuda.php?cat=5">Ženske hlače</a></li>
	  <li><a href="ponuda.php?cat=6">Ženski kupaći</a></li>
	  
    </ul>
  </div>
  <div class="menu-item">
    <h4><a href="ponuda.php?cat=O">Obuća</a></h4> 
    <ul> 
      <li><a href="ponuda.php?cat=7">Japanke</a></li>
	  <li><a href="ponuda.php?cat=8">Kroksice</a></li>
	  
    </ul>
  </div>
  <div class="menu-item">
    <h4><a href="ponuda.php?cat=R">Ronilačka oprema</a></h4> 
    <ul> 
      <li><a href="ponuda.php?cat=9">Maske i disaljke</a></li>
      <li><a href="ponuda.php?cat=10">Peraje</a></li>
      
    </ul>
  </div>
  <div class="menu-item">
    <h4><a href="ponuda.php?cat=I">Igračke za plažu</a></h4> 
    <ul> 
      <li><a href="ponuda.php?cat=11">Igračke za pijesak</a></li>
	  <li><a href="ponuda.php?cat=12">Luftići</a></li>
    </ul>
  </div>
  <div class="menu-item">
    <h4><a href="ponuda.php?cat=D">Ostali dodaci</a></h4> 
    <ul> 
      <li><a href="ponuda.php?cat=13">Suncobrani</a></li>
      <li><a href="ponuda.php?cat=14">Naočale</a></li>
	  <li><a href="ponuda.php?cat=15">Šeširi</a></li>
	  <li><a href="ponuda.php?cat=16">Ručnici</a></li>
    </ul>
  </div>
  
  <div class="menu-item">
    <h4><a href="ponuda.php">Sva ponuda</a></h4> 

  </div>  

      </nav>
    </div>
  
  <section class="proizvodi column column-9">
  
     <!--<h1>Proizvodi:</h1>-->
	 
	 
	  	   <!--DOHVAĆANJE PROIZVODA-->
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
					
					/* povlače se podaci iz baze */
					    
					 if(empty($_GET['cat'])){
							
							if(isset($_POST['search'])){
							
								$text = $_POST['search'];
								$query = "SELECT * FROM proizvodi WHERE ime LIKE '%$text%'";
								
								$result = mysqli_query($con,"SELECT * FROM proizvodi WHERE ime LIKE '%$text%' OR opis LIKE '%$text%'");
								$count = mysqli_num_rows($result);
								if($count == 0){
								 echo 'Nemamo toga :/';
								}
								
							}
							else{
								$result = mysqli_query($con,"SELECT * FROM proizvodi");
								}
						}
					   else {
					 
			            $ime= $_GET['cat'];
						  
					
					 
					    if(is_numeric($ime)){
						
						$result = mysqli_query($con,"SELECT * FROM proizvodi WHERE vrsta='".$ime."' ");
						
						} else {
 
					 
						if($ime=='M'){
						$result = mysqli_query($con,"SELECT * FROM proizvodi WHERE vrsta IN (1,2,3) ");
						}
						else if($ime=='Z'){
						$result = mysqli_query($con,"SELECT * FROM proizvodi WHERE vrsta IN (4,5,6) ");
						}
						else if($ime=='O'){
						$result = mysqli_query($con,"SELECT * FROM proizvodi WHERE vrsta IN (7,8) ");
						}
						else if($ime=='R'){
						$result = mysqli_query($con,"SELECT * FROM proizvodi WHERE vrsta IN (9,10) ");
						}
						else if($ime=='I'){
						$result = mysqli_query($con,"SELECT * FROM proizvodi WHERE vrsta IN (11,12) ");
						}
						else if($ime=='D'){
						$result = mysqli_query($con,"SELECT * FROM proizvodi WHERE vrsta IN (13,14,15,16) ");
						}
						}
						
						 }
						
						
                     /* ime odredišta koje je kliknuto se traži u bazi i ispisuje se određeni sadržaj */
				
				
					  while($row = mysqli_fetch_array($result))
					    { 
					   
						
						echo '<div class="stvar column column-4">'
						     .'<form method="post" action="proba.php">'
						     .'<h3 class="ime">'.$row['ime'].'</h3>'
							 .'<img src="'.$row['slika'].'"><p>'.$row['opis'].'</p>'
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
					<li><a href="ponuda.php">HR</a></li>
					<li><a href="ponuda-en.php">EN</a></li>
				</ul>
			</nav>
			<p>Copyright &copy; BraTom</p>
		</footer>
</body>
</html>