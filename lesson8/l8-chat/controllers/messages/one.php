<?php

$id = (int)URL_PARAMS['id'];

$message = messagesOne($id);
$hasMsg = $message !== false; // $message !== null;

if($hasMsg){
	$menu = template('messages/v_message_menu');
	$content = template('messages/v_message', [
		'message' => $message
	]);

	$pageTitle = $message['name'];
	$pageContent = $pageContent = template('base/v_con2col', [
		'left' => $menu,
		'content' => $content,
		'title' => 'One message'
	]);
}
else{
	header('HTTP/1.1 404 Not Found');
	$pageContent = template('errors/v_404');
}

