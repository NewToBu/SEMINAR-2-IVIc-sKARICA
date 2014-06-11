<?php

//SPREMANJE NARUĐBE U BAZU ZA SVAKOG KORISNIKA
session_start();
 
 
 if(!empty($_POST)){
 
   if(isset($_SESSION['pac'])){
   
             $con=mysqli_connect("localhost","root","123","pisanica");
						// provjera konekcije
					if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
					
					mysqli_query($con,"SET NAMES 'utf8'");
					mysqli_query($con,"SET CHARACTER_SET 'utf8'");						
                        
						$narudba=session_encode();
					
						$ime=$_SESSION['pac'];
						$query = "UPDATE korisnici SET narudba ='".$narudba."' WHERE korisnickoIme = '".$ime."'";
						
						
						$result = mysqli_query($con, $query);
						mysqli_close($con);
   
   
                $_SESSION['cart']=array();
				$_SESSION['neki']=array();
           echo "<script type='text/javascript'>alert('NARUDBA JE ZAPRIMLJENA');
		   window.location='index.php';
          </script>";
		  
		  
		  
		  
		  
		  
		  
		  
		  
		}
		else {
		echo "<script type='text/javascript'>alert('Za kupnju morate biti logirani');
			   window.location='login.html';
				</script>";
		
	
			}
	//header('Location:kosarica.php');

	
	}else {
	  
	   echo 'Nemate pristup ovoj stranici';
	 
	 }	  
			
			    ?>