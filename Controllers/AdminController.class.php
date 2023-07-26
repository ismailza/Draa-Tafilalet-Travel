<?php
namespace Controllers;

require_once __DIR__.'/../Models/Admin.class.php';
use Models\Admin;

class AdminController
{
  public function auth ($login, $password) {
    $admin = Admin::authentificate($login);
    if (empty($admin)) return false;
    if (!password_verify($password, $admin->password_admin)) return false;
    return $admin;
  }

  public function logout () {
    $admin = new Admin;
    $admin->logout();
  }

  public function create ($nom, $prenom, $image, $email, $username, $password) {
    $values = compact('nom', 'prenom', 'image', 'email', 'username', 'password');
    return Admin::save($values);
  }

  public function update ($nom, $prenom, $image, $email, $username, $password, $id) {
    $values = compact('nom', 'prenom', 'image', 'email', 'username', 'password','id');
    return Admin::update($values);
  }

  public function delete ($id) {
    return Admin::delete($id);
  }

  public function all () {
    return Admin::getAllAdmins();
  }

  public function one ($id) {
    return Admin::getOneAdmin($id);
  }
 
}