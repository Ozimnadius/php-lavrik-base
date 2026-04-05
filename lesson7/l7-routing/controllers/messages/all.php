<?php

$messages = messagesAll();
$isTable = ($_GET['view'] ?? '') === 'table'; // index.php?view=table
$template = $isTable ? 'v_index_table' : 'v_index';

$pageTitle = 'All messages';
$pageContent = template("messages/$template", [
	'messages' => $messages
]);