<?php
declare(strict_types=1);
include_once('model/logs.php');

$logs = getLogs($_GET["id"]);

?>

<div class="logs">
    <h3>Logs</h3>
    <table>
        <thead>
        <th>Time</th>
        <th>IP</th>
        <th>Uri</th>
        <th>Referer</th>
        </thead>
        <tbody>
        <? foreach ($logs as $log): ?>
            <tr>
                <td><?= $log['time'] ?></td>
                <td><?= $log['ip'] ?></td>
                <td><?= $log['uri'] ?></td>
                <td><?= $log['referer'] ?></td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>

</div>
	