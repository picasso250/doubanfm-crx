<?php

require __DIR__.'/lib.php';
require __DIR__.'/odie.php';

$act = _req('act') ?: 'default';

$f = __DIR__."/$act.php";
if (file_exists($f)) {
    $base_url = 'http://douban.fm';
    session_start();
    require $f;
}

