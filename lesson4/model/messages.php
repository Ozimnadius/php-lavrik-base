<?php

	include_once('model/db.php');

	function messagesAll() : array{
		$sql = "SELECT * FROM messages ORDER BY dt_add DESC";
		$query = dbQuery($sql);
		return $query->fetchAll();
	}

	function messagesAdd(array $fields) : bool{
		$sql = "INSERT messages (name, text) VALUES (:name, :text)";
		dbQuery($sql, $fields);
		return true;
	}