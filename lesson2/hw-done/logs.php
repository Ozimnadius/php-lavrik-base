<?php
declare(strict_types=1);
include_once('model/logs.php');

$logs = getFiles();
?>

<div class="logs">
    <h3>Logs</h3>
    <ul>
        <? foreach ($logs as $id => $log): ?>
            <li>
                <a href="log.php?id=<?= $log; ?>" class="log">
                    <?= $log; ?>
                </a>
            </li>
        <? endforeach; ?>
    </ul>
</div>
	