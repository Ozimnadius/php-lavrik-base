<h1>Chat</h1>
<a href="index.php?c=add">add</a> |
<a href="index.php?view=table">View as table</a>
<hr>
<div>
  <? foreach ($messages as $message): ?>
    <div>
      <strong><?= $message['name'] ?></strong>
      <em><?= $message['dt_add'] ?></em>
      <div>
        <?= $message['text'] ?>
      </div>
      <a href="index.php?c=message&id=<?= $message['id_message'] ?>">
        Read more
      </a>
      <hr>
    </div>
  <? endforeach; ?>
</div>