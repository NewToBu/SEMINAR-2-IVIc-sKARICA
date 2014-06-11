<?php
 
		session_start();
		  // session_destroy();
	
    if(isset($_GET['ro'])){
			if($_GET['ro']==66){ 
				$_SESSION['cart']=array();
				$_SESSION['neki']=array();
		 
				echo "<script type='text/javascript'>
				  window.location='kosarica-en.php';
								 </script>";
			 } else{
				echo ' Access denied!!!';
             }	 
	}else{
				echo ' Access denied!!!';
             }					   
						   
?>