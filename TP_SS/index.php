
<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre','root','');

if(isset($_POST['forminscription']))
{

      $pseudo = htmlspecialchars($_POST['pseudo']);
      $mail = htmlspecialchars($_POST['mail']);
      $mail2 = htmlspecialchars($_POST['mail2']);
      $mdp = sha1($_POST['mdp']);
      $mdp2 =sha1($_POST['mdp2']);


  if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])){
    
      $pseudolength =strlen($pseudo);
      if($pseudolength <= 255){
        
        if($mail == $mail2)
        {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)){

            $req = $bdd->prepare("SELECT * FROM membre WHERE mail = ?");
            $req -> execute(array($mail));
            $mailexiste =$req->rowCount();
            if($mailexiste == 0){
            
            if($mdp == $mdp2){

                $insertprm = $bdd->prepare("INSERT INTO membre(pseudo,mail,motdepasse) VALUES(?,?,?)");
                $insertprm -> execute(array($pseudo,$mail,$mdp));
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("votre compte a été bien créé","Succes to registration!","success");';
                echo '}, 1000);</script>';
                
                
            }else{
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("vos mdp ne correspendant pas","Message Erreur","error");';
                echo '}, 1000);</script>';
            }
          }else{
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("Adresse mail déjà utilisée","Message Erreur","error");';
                echo '}, 1000);</script>';
          }
          }
        }
        else{
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("vous adresse mail nest pas valide","Message Erreur","error");';
                echo '}, 1000);</script>';
        }


      }
      else{

                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("ne doit pas dépasser 255 caractère !","Message Erreur","error");';
                echo '}, 1000);</script>';

      }

  }
  else{
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("tous les champs doivent étre complet !","Message Erreur","error");';
                echo '}, 1000);</script>';
  }
}

?>



<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <style>
  body{
    margin: 5% 5% 5% 10%;
  }
  </style>
   <title> TP Software Security </title>
   <meta charset="utf-8">
</head>
<body>

  
<div class="container">
  <h2>Inscription</h2>
  <br>
  <form action="" method="post">
    <div class="form-group">
      <label for="pseudo">Pseudo:</label>
      <input type="text" class="form-control" id="Pseudo" placeholder="Enter pseudo" name="pseudo" value="<?php if(isset($pseudo)) {echo $pseudo;} ?>"/>
    </div>
    <div class="form-group">
      <label for="mail">Email:</label>
      <input type="email" class="form-control" id="mail" placeholder="Enter email" name="mail" value="<?php if(isset($mail)) {echo $mail;} ?>">
    </div>
    <div class="form-group">
      <label for="mail2">Confirmation d'email:</label>
      <input type="email" class="form-control" id="mail2" placeholder="Enter Confirmation email" name="mail2" value="<?php if(isset($mail2)) {echo $mail2;} ?>">
    </div>
    <div class="form-group">
     <label for="mdp">Mot de Passe:</label>
     <input type="password" class="form-control" id="mdp" placeholder="Enter Mot de Passe" name="mdp" > 
    </div>

    <div class="form-group">
     <label for="mdp2">Confirmation Mot de passe:</label>
     <input type="password" class="form-control" id="mdp2" placeholder="Enter Confirmation Mot de Passe" name="mdp2">
    </div>


    <button type="submit" name="forminscription" class="btn btn-default">Submit</button>
  </form>
  <?php
  
  if(isset($erreur)){
    echo $erreur;
  }

  ?>


  </div>



</body>




</html>
