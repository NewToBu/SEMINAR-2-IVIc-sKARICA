<?php

 session_start();
 
 /*    echo '</br>'; print_r($_SESSION); */
    $r=0;
  
	for ($i = 0; $i < count($_SESSION['cart']); $i++)
      {
	      if($_GET['taj']==$_SESSION['cart'][$i])
		    {
			 echo '</br>'; print_r($_SESSION);
	           $r++;
	        }
      }
	  
	  

	   do {
    
              unset($_SESSION['cart'][array_search($_GET['taj'],$_SESSION['cart'])]);
	          $r--;
   
   
         } while ($r > 0);
		 
		 
		 $foo2 = array_values($_SESSION['cart']);
		 $_SESSION['cart']=$foo2;
	

	for ($i = 0; $i < count($_SESSION['neki']); $i++)
      {   
	      if($_GET['taj']==$_SESSION['neki'][$i]['id'])
		    {
	           unset($_SESSION['neki'][$i]);
			   
			   $foo2 = array_values($_SESSION['neki']);
	           $_SESSION['neki']=$foo2;
			
			   break;
	        }
      }
	  
	  

	   
	   
 
	
	
	header('Location:kosarica-en.php');
		
      
       
			
			    ?>