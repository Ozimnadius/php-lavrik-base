<div class="form">
	<form method="post">
		Name:<br>
		<input type="text" name="name" value="<?=$fields['name']?>"><br>
		Text:<br>
		<textarea name="text"><?=$fields['text']?></textarea><br>
		<button>Send</button>
		<div class="error-list">
		<? foreach($validateErrors as $error): ?>
			<p><?=$error?></p>
		<? endforeach; ?>
		</div>
		
	</form>
</div>