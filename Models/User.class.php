<?php

namespace Models;

require_once __DIR__.'/DataBase.class.php';

abstract class User
{
  abstract public static function authentificate ($login);
}