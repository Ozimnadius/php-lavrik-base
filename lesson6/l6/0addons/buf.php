<?php

	ob_start();
	echo 1;
	echo 2;
	$res = ob_get_clean();
	
	echo 3;
	echo $res;