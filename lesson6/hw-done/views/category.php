<ul class="list-group">
  <? foreach ($rows as $row): ?>
    <li class="list-group-item">
      <a href="index.php?c=article&id=<?= $row['id_article'] ?>">
        <?= $row['title'] ?>
      </a>
    </li>
  <? endforeach; ?>
</ul>