<?php

if($user === null){
	header('Location: ' . BASE_URL . 'auth/login');
	exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$fields = extractFields($_POST, ['name', 'text']);
	$validateErrors = messagesValidate($fields);	

	if(empty($validateErrors)){
		messagesAdd($fields);
		$_SESSION['messages.added'] = true;
		header('Location: ' . BASE_URL);
		exit();
	}
}
else{
	$fields = ['name' => '', 'text' => ''];
	$validateErrors = [];
}

$pageTitle = 'Add message';
$pageContent = template('messages/v_add', [
	'fields' => $fields,
	'validateErrors' => $validateErrors
]);