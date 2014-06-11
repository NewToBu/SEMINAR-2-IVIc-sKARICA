<?php
//PROBA.PHP  SE POZIVA KLIKOM NA GUMB "DODAJ U KOŠARICU" KOD SVAKOG PROIZVODA. TU SE ODRAĐUJE ZAPISIVANJE U SESSION VARJABLU ŠTO SE DODALO U KOŠARICU
 session_start();
 
 
 if(!empty($_POST)){
 
 $return_url = base64_decode($_POST["return_url"]);
 
/*  header('Location:'.$return_url); */
 
  
    if(empty($_SESSION['cart'])){
	 $_SESSION['cart']=array();
	 $_SESSION['neki']=array();
	}
	array_push($_SESSION['cart'],$_POST['id']);
	
	 if(count($_SESSION['neki'])!=0){
	 $br=0;
	for ($i = 0; $i < count($_SESSION['neki']); $i++) {
	
	   
	   
       if($_SESSION['neki'][$i]['id']==$_POST['id']){
             $trenutno=$_SESSION['neki'][$i]['kolicina'];
            	$_SESSION['neki'][$i]['kolicina']= $trenutno+$_POST['kolicina']; 
 	            $br++;
	   }
	   
       } 
		if($br==0){
		
	   
	   $polje = array('id'=>$_POST['id'],'kolicina'=>$_POST['kolicina']);
       array_push($_SESSION['neki'],$polje);
	  
	   
		}
		
	}else {
	 $polje = array('id'=>$_POST['id'],'kolicina'=>$_POST['kolicina']);
     array_push($_SESSION['neki'],$polje);
	}	
	

	
	header('Location:'.$return_url);
		}
      
     else {
	  
	   echo 'Nemate pristup ovoj stranici';
	 
	 }	  
			
			    ?>