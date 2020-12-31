<?php

$server = new \Swoole\Server("127.0.0.1", 9501);

// 调用 onReceive 事件回调函数时底层会自动创建一个协程
$server->on('receive', function($serv, $fd, $from_id, $data){
   $serv->send($fd, 'Swoole：' . $data);
   $serv->close($fd);
});

$server->start();