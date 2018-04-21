<?php
$i = 0;
header('X-Accel-Buffering: no');
while (true) {
    $j = $i % 10;
    $cont = file_get_contents("./frames/{$j}.txt");
    echo "\033[2J\033[H";
    echo $cont;
    @ob_end_flush();
    flush();
    $i++;
    usleep(70000);
}
