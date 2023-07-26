<?php

namespace Models;

require_once 'DataBase.class.php';

abstract class Article
{
  static public abstract function save ($values);
  static public abstract function update ($values);
  static public abstract function delete ($id);
}