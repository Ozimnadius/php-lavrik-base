<?php

	$now = time();

	if(!isset($_COOKIE['impsystemtime'])){
		setcookie('impsystemtime', $now, time() + 3600 * 24 * 7);
	}
	
	$first = (int)($_COOKIE['impsystemtime'] ?? $now);
	$diff = $now - $first;

	$saleTime = 3599 - $diff;
	
	if($saleTime > 0){
		echo 'Sale now! - ';
		echo date('i:s', $saleTime);
	}