<?php

$server = new Swoole\Http\Server('127.0.0.1', 9501, SWOOLE_BASE);

$server->on('Request', function ($request, $response) {
    $mysql = new Swoole\Coroutine\MySQL();
    $res = $mysql->connect([
        'host' => '127.0.0.1',
        'user' => 'root',
        'password' => 'root',
        'database' => 'test',
    ]);
    if ($res == false) {
        $response->end("MySQL connect fail!");
        return;
    }
    $ret = $mysql->query('show tables', 2);
    $response->end("swoole response is ok, result=".var_export($ret, true));
});

$server->start();