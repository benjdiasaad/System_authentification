
<?php
session_start();

require "connection.php";
if (isset($_POST['connecter'])) 
{
	$requete="SELECT * FROM membre WHERE mail='".$_SESSION['saad']."'";
	$resultat=$pdo->query($requete);
    $data = $resultat->fetch(PDO::FETCH_ASSOC);
	if(isset($_SESSION['saad']))
	{
		if ($_POST['mdp']==$_POST['mdp2'])
		 {
			$re="UPDATE membre SET motdepasse='".$_POST['mdp']."' WHERE mail='".$_SESSION['saad']."'";
			$pdo->exec($re);
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("mot de passe bien changer","Succes to registration!","success");';
            echo '}, 1000);</script>';

     


		}
		
		else
		{
            echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("Mot de passe et conffirmation ne sont pas identique !!!!!","Message Erreur","error");';
                echo '}, 1000);</script>';
		}
		
	}
	

}
?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>

    <title>forgot password</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="stylees.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Recuperation de mot de passe pour <i> <?php echo $_SESSION['saad']; ?> </i></h3>
				<div class="d-flex justify-content-end social_icon">
					
				</div>
			</div>
			<div class="card-body">
				<form method=post action=mdp.php>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="password" class="form-control" name="mdp" placeholder="Nouveau mdp">
                    </div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="password" class="form-control" name="mdp2" placeholder="Confirmation de nouveau mdp">
					</div>
					
					
					<div class="form-group">
						<input type="submit" value="valider" class="btn float-right login_btn" name="connecter">
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
</body>
</html>