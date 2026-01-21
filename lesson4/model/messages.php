<?php

	include_once('model/db.php');

	/**
	 * Return all messages from the database, sorted descending by date of addition
	 *
	 * @return array Associative array with keys 'id', 'name', 'text', 'dt_add' and 'status'
	 */
	function messagesAll() : array{
		$sql = "SELECT * FROM messages ORDER BY dt_add DESC";
		$query = dbQuery($sql);
		return $query->fetchAll();
	}


	/**
	 * Add a new message to the database
	 *
	 * @param array $fields Associative array with keys 'name' and 'text'
	 * @return bool True if the message has been added successfully, false otherwise
	 */
	function messagesAdd(array $fields) : bool{
		$sql = "INSERT messages (name, text) VALUES (:name, :text)";
		dbQuery($sql, $fields);
		return true;
	}