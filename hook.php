<?php
$payload = $_REQUEST['payload'];
$post_log = fopen("github_log.txt", "w");
fwrite($post_log, $payload);
fclose($post_log);

echo 'received';