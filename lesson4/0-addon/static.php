<?php

	function test(){
		static $a;

		if($a === null){
			$a = 0;
		}

		$a++;
		return $a;
	}

	echo test();
	echo test();
	echo test();
	echo test();
	echo test();
