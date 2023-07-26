<?php
  require_once 'connect.php';
  if (isset($_POST['submit']))
  {
    $nom    = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email  = htmlspecialchars($_POST['email']);
    $login  = htmlspecialchars($_POST['login']);
    $password = md5(htmlspecialchars($_POST['password']));
    $confirm_password = md5(htmlspecialchars($_POST['confirm_password']));
    /* check that the email and login not already exist in client table  */
    $stmCE = $pdo->prepare("SELECT email_client FROM client WHERE email_client=?");
    $stmCE->setFetchMode(PDO::FETCH_ASSOC);
    $stmCE->execute(array($email));
    $stmCL = $pdo->prepare("SELECT login_client FROM client WHERE login_client=?");
    $stmCL->setFetchMode(PDO::FETCH_ASSOC);
    $stmCL->execute(array($login));  
    /* check that the email and login not already exist in admin table  */
    $stmAE = $pdo->prepare("SELECT email_admin FROM admin WHERE email_admin=?");
    $stmAE->setFetchMode(PDO::FETCH_ASSOC);
    $stmAE->execute(array($email));
    $stmAL = $pdo->prepare("SELECT login_admin FROM admin WHERE login_admin=?");
    $stmAL->setFetchMode(PDO::FETCH_ASSOC);
    $stmAL->execute(array($login));       
    session_start();
    if ($stmCE->rowCount() || $stmAE->rowCount()) $_SESSION['error'] = "Email déjà existe!";
    elseif ($stmCL->rowCount() || $stmAL->rowCount()) $_SESSION['error'] = "Nom d'utilisateur déjà existe!";
    else
    {
      if ($password == $confirm_password)
      {
        $code = rand(111111,999999);
        $status = "notverified";
        $ins = $pdo->prepare("INSERT INTO client (nom_client,prenom_client,email_client,login_client,password_client,date_inscription,code,status) VALUES (?,?,?,?,?,CURRENT_TIMESTAMP,?,?)");
        $ins->execute(array($nom,$prenom,$email,$login,$password,$code,$status));
        if ($ins)
        {
          $nom = $nom;
          $prenom = $prenom;
          $subject = "Confirmation de votre email";
          $sender = "From: ismailza437@gmail.com";
          $mailcontent = ' 
            <html> 
            <head> 
              <title>Drâa Tafilalet Tourism</title> 
            </head> 
            <body> 
              <center><h2>Drâa Tafilalet Tourism</h2></center>
              <h4>Bonjour '.$prenom.' '.$nom.'</h4>
              <p>Votre code de vérification est : <b>'.$code.'</b></p>
            </body> 
            </html>'; 
          $headers = "MIME-Version: 1.0" . "\r\n"; 
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
          $headers .= 'From: ismailza437@gmail.com' . "\r\n"; 
          if (mail($email,$subject,$mailcontent,$headers))
          {
            $_SESSION['success'] = "Nous avons envoyé le code de vérification à votre email";
            $_SESSION['inscription'] = true;
            header("location: ../reset_code.php");
            exit;
          }
          else $_SESSION['error'] = "Erreur lors de l'envoi de code de récupération!";
        }
        else $_SESSION['error'] = "Votre inscription non effectuée!";
      }
      else $_SESSION['error'] = "Mots de passe non identiques!";
    }
  }
  header("location: ../signform");
?>