<?php

	setcookie('login', 'admin', time() + 3600 * 24 * 7);
	setcookie('pass', '12345', time() + 3600 * 24);

	echo '<pre>';
	print_r($_COOKIE);
	echo '</pre>';