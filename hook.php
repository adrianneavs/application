<?php
$payload = print_r($_REQUEST,TRUE);
$post_log = fopen("github_log.txt", "w");
fwrite($post_log, $payload);
fclose($post_log);

if ( $_POST['payload'] ) {
  shell_exec( 'cd /www/git-repo/ && git reset --hard HEAD && git pull' );
}

echo 'received'.$payload;