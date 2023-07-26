<?php

namespace Models;

use Models\DataBase;

require_once __DIR__.'/DataBase.class.php';

class Message
{
  static public function save ($values) {
    $db = new DataBase;
    $db->query("INSERT INTO messages VALUES ('', :nom_redacteur, :email_redacteur, :sujet, :message, CURRENT_TIMESTAMP)");
    foreach ($values as $key => $value) $db->bind($key, $value);
    return $db->execute();
  }

  static public function getAllMessages () {
    $db = new DataBase;
    $db->query("SELECT * FROM messages ORDER BY createdAt DESC");
    return $db->allResults();
  }
}