<?php

	echo '<pre>';
	print_r($_GET);
	echo '</pre>';

	$id = (int)($_GET['id'] ?? '');
	echo $id;
    ?>

<script>
     fetch('/php/ajax.php',{
            method: 'POST',
            body: new FormData(this.form)
        }).then(response => response.json()).then(function (data){
            console.log(data);
        }).catch(function(err) {console.log('Fetch Error :-S', err);});
</script>
