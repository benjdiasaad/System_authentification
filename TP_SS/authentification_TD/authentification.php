<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html>
<head>
   <style>
     h3{
		 color: white;
	 }
	</style>	   
	<title>Bienvenu</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
require 'connection.php';

session_start();
if(isset($_POST['pseudo'])){
$requete = "SELECT * FROM membre
WHERE pseudo ='".$_POST['pseudo']."'
AND motdepasse ='".$_POST['motdepasse']."'";
$resultat = $pdo->query($requete);
$data = $resultat->fetch(PDO::FETCH_ASSOC);
if(isset($data['pseudo'])){
	$_SESSION['pseudo']=$data['pseudo'];
	
}
if(isset($_SESSION['pseudo'])){	
   

	 echo"<ul>";
	 echo'<li><img class="img-profile rounded-circle" src="fati.png"/></li>';
	 echo"<li style=float:right;margin-top:15px;><a class=active href=deconnection.php>Deconnexion</a></li>";
	 echo"</ul>";	
	 echo "<br> <br>";
	 
	 echo '<h3 style="color:white;font-weight:bold;margin-top:10px;text-align:center;"> Bienvenue '.$_POST['pseudo'].'</h3>';
}


 if(!empty($_POST['remember'])){
      setcookie("pseudo",$_POST['pseudo'],time()+(10 * 365 * 24 * 60 * 60));
      setcookie("motdepasse",$_POST['motdepasse'],time()+(10 * 365 * 24 * 60 * 60));
    }
    else
    {
    	if(isset($_COOKIE['pseudo'])){
    		setcookie("pseudo","");
    	}
    	if(isset($_COOKIE['motdepasse'])){
    		setcookie("motdepasse","");
    	}

    }
    header("localhost:authentification.php");

}
else
{
	echo"les informations incorrectes veuillez saisir une autre fois!";
	echo"<br/><br/>";
	echo"<a href=auth.php>Retour!</a>";
}
?>
</body>
</html>