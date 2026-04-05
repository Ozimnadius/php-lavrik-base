<?php

	function checkControllerName(string $name) : bool{
		return !!preg_match('/^[aA-zZ0-9_-]+$/', $name);
	}

	function template(string $path, array $vars = []) : string{
		$systemTemplateRenererIntoFullPath = "views/$path.php"; 
		extract($vars);
		ob_start();
		include($systemTemplateRenererIntoFullPath);
		return ob_get_clean();
	}

	function parseUrl($url){
		$params = explode('/', $url);
		$cnt = count($params);

		if($params[$cnt - 1] === ''){
			unset($params[$cnt - 1]);
		}

		return $params;
	}