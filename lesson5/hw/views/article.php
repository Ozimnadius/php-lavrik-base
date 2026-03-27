<div class="content">

  <div class="article">
    <h1><?= $article['title'] ?></h1>
    <div><?= $article['content'] ?></div>
    <hr>
    <a href="index.php?c=delete&id=<?= $article['id_article'] ?>">Remove</a>
    <a href="index.php?c=edit&id=<?= $article['id_article'] ?>">Edit</a>
  </div>

</div>
<hr>
<a href="index.php">Move to main page</a>