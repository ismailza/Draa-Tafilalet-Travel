<?php

namespace Controllers;

use Models\Client;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__.'/../Models/Client.class.php';
require_once __DIR__.'/PHPMailer/Exception.php';
require_once __DIR__.'/PHPMailer/PHPMailer.php';
require_once __DIR__.'/PHPMailer/SMTP.php';

class ClientController
{
  public function auth ($login, $password) {
    $client = Client::authentificate($login);
    if (empty($client)) return false;
    if (!password_verify($password, $client->password_client)) return false;
    return $client;
  }

  public function logout () {
    $client = new Client;
    $client->logout();
  }

  public function checkEmail ($email) {
    if (empty(Client::checkEmail($email))) return false;
    return true;
  }

  public function verified ($email) {
    if (empty(Client::verified($email))) return true;
    return false;
  }

  public function create ($nom, $prenom, $email, $username, $password) {
    $values = compact('nom', 'prenom', 'email', 'username', 'password');
    return Client::save($values);
  }

  public function update ($nom, $prenom, $email, $username, $password, $id) {
    $values = compact('nom', 'prenom', 'email', 'username', 'password','id');
    return Client::update($values);
  }

  public function delete ($id) {
    return Client::delete($id);
  }

  public function all () {
    return Client::getAllClients();
  }

  public function one ($id) {
    return Client::getOneClient($id);
  }

  public function countClients () {
    return is_null($count = Client::count()) ? 0 : $count->nb_clients;
  }

  public function changePassword ($email, $password) {
    return Client::setPassword($email, password_hash($password, PASSWORD_DEFAULT));
  }

  public function sentCodeVerification ($email) {
    $code = rand(111111,999999);
    Client::setCode($email, $code);
    $client = Client::checkEmail($email);

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ismailza437@gmail.com';
    $mail->Password   = 'wzrtgciagbiajcnq';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    $mail->setFrom('ismailza437@gmail.com', 'Draa Tafilalet Travel');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject    = "Recover password";
    $mail->Body       = "
      <html>
      <head>
        <meta charset=\"utf-8\">
      </head>
      <body>
        <center><h2>Drâa Tafilalet Travel</h2></center>
        <h4>Bonjour $client->prenom_client $client->nom_client</h4>
        <p>Votre code de récupération de mot de passe est : <b>$code</b></p>
      </body>
      </html>
    ";
    return $mail->send();
  }

  public function getCodeVerification ($email) {
    if (!empty($rec = Client::getCode($email))) return $rec->code;
    return false;
  }

  public function deleteVerificationCode ($email) {
    return Client::deleteVerificationCode($email);
  }

  
}