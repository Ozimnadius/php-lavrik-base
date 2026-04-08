<?php

	session_start();

	$_SESSION['some'] = 1;
	$_SESSION['a'] = 'hello';

?>
<a href="4-session-test.php">Test</a>