<?php

include_once('model/messages.php');

// checkID
$strId = $_GET['id'] ?? '';
$id = (int)$strId;

$message = messagesOne($id);
$hasMsg = $message !== false; // $message !== null;

if ($hasMsg) {
  include('views/v_message.php');
} else {
  header('HTTP/1.1 404 Not Found');
  include('views/errors/v_404.php');
}

