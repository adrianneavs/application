<?php

$post_log = fopen("github_log.txt", "w");
fwrite($post_log, print_r($_POST,TRUE));
fclose($post_log);