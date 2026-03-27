<?php
declare(strict_types=1);
include_once 'model/categories.php';

$rows = getAllCategories();

include 'views/index.php'

?>

	