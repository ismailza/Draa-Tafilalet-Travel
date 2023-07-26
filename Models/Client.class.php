<?php

namespace Models;

require_once 'User.class.php';

class Client extends User
{

  static public function authentificate($login) {
    $db = new DataBase();
    $db->query("SELECT * FROM clients WHERE username_client = :login OR email_client = :login");
    $db->bind("login", $login);
    $user = $db->singleResult();
    return $user;
  }

  static public function checkEmail ($email) {
    $db = new DataBase();
    $db->query("SELECT * FROM clients WHERE email_client = :email");
    $db->bind("email", $email);
    return $db->singleResult();
  }

  static public function verified ($email) {
    $db = new DataBase();
    $db->query("SELECT * FROM password_recover WHERE email = :email");
    $db->bind("email", $email);
    return $db->singleResult();
  }

  static public function save ($values) {
    $db = new DataBase;
    $db->query("INSERT INTO clients VALUES ('', :nom, :prenom, :email, :username, :password, CURRENT_TIMESTAMP, NULL)");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }

  static public function update ($values) {
    $db = new DataBase;
    $db->query("UPDATE clients SET nom_client = :nom, prenom_client = :prenom, email_client = :email, username_client = :username, password_client = :password, lastUpdateAt = CURRENT_TIMESTAMP WHERE id_client = :id");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }

  static public function delete ($id) {
    $db = new DataBase;
    $db->query("DELETE FROM clients WHERE id_client = :id");
    $db->bind("id", $id);
    return $db->execute();
  }

  static public function getAllClients () {
    $db = new DataBase;
    $db->query("SELECT * FROM clients ORDER BY createdAt DESC");
    return $db->allResults();
  }

  static function getOneClient ($id) {
    $db = new DataBase;
    $db->query("SELECT * FROM clients WHERE id_client = :id");
    $db->bind("id", $id);
    return $db->singleResult();
  }

  static public function setCode ($email, $code) {
    $db = new DataBase();
    $db->query("INSERT INTO password_recover VALUES (:email, :code)");
    $db->bind("email", $email);
    $db->bind("code", $code);
    return $db->execute();
  }

  static public function deleteVerificationCode ($email) {
    $db = new DataBase();
    $db->query("DELETE FROM password_recover WHERE email = :email");
    $db->bind("email", $email);
    return $db->execute();
  }

  static function setPassword ($email, $password) {
    $db = new DataBase();
    $db->query("UPDATE clients SET password_client = :password WHERE email_client = :email");
    $db->bind("password", $password);
    $db->bind("email", $email);
    return $db->execute();
  }

  public function logout () {
    session_start();
    unset($_SESSION['auth']);
    session_destroy();
  }

  static public function getCode ($email) {
    $db = new DataBase();
    $db->query("SELECT * FROM password_recover WHERE email = :email");
    $db->bind("email", $email);
    return $db->singleResult();
  }

  static public function count () {
    $db = new DataBase();
    $db->query("SELECT COUNT(*) 'nb_clients' FROM clients");
    return $db->singleResult();
  }
}