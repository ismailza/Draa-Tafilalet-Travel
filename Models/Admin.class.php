<?php

namespace Models;

require_once __DIR__.'/User.class.php';

class Admin extends User 
{
  
  static public function authentificate($login) {
    $db = new DataBase();
    $db->query("SELECT * FROM admins WHERE username_admin = :login OR email_admin = :login");
    $db->bind("login", $login);
    $user = $db->singleResult();
    return $user;
  }

  static public function save ($values) {
    $db = new DataBase;
    $db->query("INSERT INTO admins VALUES ('', :nom, :prenom, :image, :email, :username, :password, CURRENT_TIMESTAMP, NULL)");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }

  static public function update ($values) {
    $db = new DataBase;
    $db->query("UPDATE admins SET nom_admin = :nom, prenom_admin = :prenom, image_admin = :image, email_admin = :email, username_admin = :username, password_admin = :password, lastUpdateAt = CURRENT_TIMESTAMP WHERE id_admin = :id");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }

  static public function delete ($id) {
    $db = new DataBase;
    $db->query("DELETE FROM admins WHERE id_admin = :id");
    $db->bind("id", $id);
    return $db->execute();
  }

  static public function getAllAdmins () {
    $db = new DataBase();
    $db->query("SELECT * FROM admins");
    return $db->allResults();
  }

  static public function getOneAdmin ($id) {
    $db = new DataBase();
    $db->query("SELECT * FROM admins WHERE id_admin = :id");
    $db->bind("id", $id);
    return $db->singleResult();
  }

  public function logout () {
    session_start();
    unset($_SESSION['admin']);
    session_destroy();
  }

}