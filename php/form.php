<?php

// require_once ('recaptchalib.php');





// $pubkey= "6LdQjqUZAAAAALL1G9TN12elw0_5ba576YA2r3r9";
// $privkey= "6LdQjqUZAAAAAMTEQyy-RmXORIWq0Sg-yPvXRICP";



  if(!empty($_POST)){

    extract($_POST);
    $valider = true;
    
     if(empty($nom)){

      $valider = false ; 
      $erreurname = "Veuillez remplir votre Nom !";
     }
    
     if(!preg_match("/^[a-z0-9\-_.]+@[a-z0-9\-_.]+.[a-z]{2,3}$/i",$email)){

      $valider=false;
      $erreuremail="Votre Email n'est valide !!";
     }
     if(empty($email)){

      $valider = false ; 
      $erreuremail = "Veuillez remplir votre Email !";
     }
     if(empty($msg)){

      $valider = false ; 
      $erreurmsg = "Veuillez remplir votre Email !";
     }
   //jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj

  


    


    if($valider){

      $to="moutaalimomar@gmail.com";
      $sujet = $nom."a contacté le site";
 
      $message = '<html><head><title>Titre</title></head>';
      $message.= '<body><p>'.$nom.'</p>';
      $message.='<p>email:'.$email.'</p>';
      $message.='<p>message:'.$msg.'</p></body>';
 
      $headers ='MIME-Version:1.0'."\r\n";
      $headers.='Content-type:text/html; charset = iso-8852-1'."\r\n";
      $headers.="from: votre site <info@ocp.com>"."\r\n";
      $headers.="Reply-tp:.$email";

      if(mail($to,$sujet,$message,$headers)){

      $erreur ='<div class="alert alert-success">Votre message nous ai bien parvenu</div>';
      unset($nom);
      unset($email);
      unset($msg);
    }else{
      
      $erreur = '<div class="alert alert-danger">Atention ! une erreur est survenu!</div>';
    }

    }
  }


 ?>
    





<head>
<title>contact</title>
<link rel="stylesheet" type="text/css" href="../css/style.css"></head>


</head>
<body>
  <h1>formulaire php </h1>
 <?php if(isset($erreur)) echo $erreur;   ?>
  <form method="post" action="form.php">
    <table>
          <tr>
              <td><label for="nom">Nom : </label></td>
              <td><input type="text" name="nom" placeholder="nom" id="nom" value="<?php if(isset($nom)) echo $nom ?>"></td>
              <td><span class="errormsg"> <?php if(isset($erreurname)) echo $erreurname ;  ?></span></td>
        </tr>
          <tr>
              <td><label for="email">Email : </label></td>
              <td><input type="text" name="email" placeholder="email@gmail.com" id="email" value="<?php if(isset($email)) echo $email ?>"></td>
              <td><span class="errormsg"><?php if(isset($erreuremail)) echo $erreuremail ;  ?></span></td>
        </tr>
          <tr>
              <td><label for="msg">Message : </label></td>
              <td><textarea  name="msg" placeholder="message" id="msg"><?php if(isset($msg)) echo $msg; ?></textarea></td>
              <td><span class="errormsg"><?php if(isset($erreurmsg)) echo $erreurmsg;  ?></span></td>
        </tr>
     
      
        
        <tr>
 
            <td><input type="submit" value="envoyer"></td>
        </tr>
      </table>
  </form>
 
    
</body>
</html>