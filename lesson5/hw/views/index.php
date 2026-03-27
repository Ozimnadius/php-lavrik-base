<a href="index.php?c=add">Add article</a>
<hr>
<div class="categories">
  <? foreach ($rows as $row): ?>
    <a href="index.php?c=category&id=<?= $row['id_category'] ?>" class="categories__item">
      <h2><?= $row['name'] ?></h2>
    </a>
  <? endforeach; ?>
</div>