<?php
 //PRAŽNJENJE KOŠARICE U POTPUNOSTI
		session_start();
		  // session_destroy();
	
    if(isset($_GET['ro'])){
			if($_GET['ro']==66){ 
				$_SESSION['cart']=array();
				$_SESSION['neki']=array();
		 
				echo "<script type='text/javascript'>
				  window.location='kosarica.php';
								 </script>";
			 } else{
				echo ' Nemaš pristup!!!';
             }	 
	}else{
				echo ' Nemaš pristup!!!';
             }					   
						   
?>