<h1>Chat</h1>
<a href="index.php">View as list</a>
<hr>
<table>
  <? foreach ($messages as $message): ?>
    <tr>
      <td><?= $message['name'] ?></td>
      <td><?= $message['dt_add'] ?></td>
      <td>1?0</td>
    </tr>
  <? endforeach; ?>
</table>