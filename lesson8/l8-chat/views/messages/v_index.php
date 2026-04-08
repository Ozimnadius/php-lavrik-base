<main>
	<h1>All messages</h1>
	<hr>
	<? if($alertAdded): ?>
	<div class="alert alert-success">
		Your message was added
	</div>
	<hr>
	<? endif; ?>
	<a href="<?=BASE_URL?>?view=table">View as table</a>
	<hr>
	<div>
	<? foreach($messages as $message): ?>
		<div>
			<strong><?=$message['name']?></strong>
			<em><?=$message['dt_add']?></em>
			<div>
				<?=$message['text']?>
			</div>
			<a href="<?=BASE_URL?>message/<?=$message['id_message']?>">
				Read more
			</a>
			<hr>
		</div>
	<? endforeach; ?>
	</div>
</main>