<?php
declare(strict_types=1);
include_once('model/categories.php');

$rows = getAllCategories();
?>
<a href="add.php">Add article</a>
<hr>
<div class="categories">
  <? foreach ($rows as $row): ?>
    <a href="category.php?slug=<?= $row['slug'] ?>"
       class="categories__item"
    >
      <h2><?= $row['name'] ?></h2>
    </a>
  <? endforeach; ?>
</div>
	