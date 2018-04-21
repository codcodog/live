<?php

$user_agent = $_SERVER['HTTP_USER_AGENT'];
$url        = 'https://github.com/codcodog/live';
$pattern    = '*curl*';
$is_curl    = preg_match($pattern, $user_agent);

if ( ! $is_curl) {
    header("Location: $url");
    exit;
}

$i = 0;
header('X-Accel-Buffering: no'); # Nginx 服务器，禁止缓存；Apache 则不用.
while (true) {
    $j = $i % 10;
    $cont = file_get_contents("./frames/{$j}.txt");
    echo "\033[2J\033[H";
    echo $cont;
    @ob_end_flush();
    flush();
    $i++;
    usleep(60000);
}
