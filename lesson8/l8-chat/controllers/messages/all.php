<?php

$messages = messagesAll();
$isTable = ($_GET['view'] ?? '') === 'table'; // index.php?view=table
$template = $isTable ? 'v_index_table' : 'v_index';

$alertAdded = false;

if(isset($_SESSION['messages.added'])){
	$alertAdded = true;
	unset($_SESSION['messages.added']);
}

$pageTitle = 'All messages';
$pageContent = template("messages/$template", [
	'messages' => $messages,
	'alertAdded' => $alertAdded
]);