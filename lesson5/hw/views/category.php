<div class="articles">
  <h1><?= $category['name'] ?></h1>
  <div class="articles__list">
    <? foreach ($rows as $row): ?>
      <a href="index.php?c=article&id=<?= $row['id_article'] ?>"
         class="articles__item"
      >
        <h3><?= $row['title'] ?></h3>
      </a>
    <? endforeach; ?>
  </div>
</div>
<hr>
<a href="index.php">Move to main page</a>