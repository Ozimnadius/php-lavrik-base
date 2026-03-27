<form method="post">
  Заголовок:<br>
  <input type="text"
         name="title"
         value="<?= $fields['title'] ?>"
  >
  <br>
  Категория:<br>
  <select name="id_category">
    <? foreach ($categories as $category): ?>
      <option <? if ($fields['id_category'] == $category['id_category']): ?>selected<? endif; ?>
              value="<?= $category['id_category']
              ?>"
      >
        <?= $category['name'] ?>
      </option>
    <? endforeach; ?>
  </select>
  <br>
  Content:<br>
  <textarea name="content"
            cols="30"
            rows="10"
  ><?= $fields['content'] ?></textarea>
  <button>Send</button>
  <div class="error-list">
    <? foreach($validateErrors as $error): ?>
      <p><?=$error?></p>
    <? endforeach; ?>
  </div>
</form>