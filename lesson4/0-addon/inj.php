<?php

	$db = new PDO('mysql:host=localhost;dbname=php1simple', 'root', '');
	$db->exec('SET NAMES UTF8');

	// ?id=2&text=HelloAdmin',status='1
	$text = $db->quote($_GET['text']); 
	var_dump($_GET['text']);
	var_dump($text);
	$id = (int)($_GET['id'] ?? ''); // id=2' OR 1=1

	// HelloAdmin',status='1
	// HelloAdmin\',status=\'1

	$sql = "UPDATE messages SET text=$text WHERE id_message=$id";
	$db->exec($sql);

	//$a = 'Hello all d\'a'

	
	/*
	$name = 'Admin'; // $_POST['name']
	$text = 'Delete all!'; // $_POST['text']
	$status = 1;

	$query->bindParam(':name', $name);
	$query->bindParam(':text', $text);
	$query->bindParam(':status', $status);
	*/