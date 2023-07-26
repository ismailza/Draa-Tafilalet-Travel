<?php

namespace Controllers;

use Models\Message;

require_once __DIR__.'/../Models/Message.class.php';

class MessageController
{
  public function all () {
    return Message::getAllMessages();
  }

  public function create ($nom_redacteur, $email_redacteur, $sujet, $message) {
    $values = compact('nom_redacteur', 'email_redacteur', 'sujet', 'message');
    return Message::save($values);
  }
}