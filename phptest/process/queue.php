<?php

$process = new swoole_process(function (\Swoole\Process $worker) {
   // 子进程逻辑
    // 从消息队列读取数据
    $cmd = $worker->pop();
    echo "Message from master process: " . $cmd . "\n";
    ob_start();
    // 执行外部程序并显示未经处理的原始输出，会直接打印输出
    passthru($cmd);
    $ret = ob_get_clean() ? : ' ';
    $ret = trim($ret) . ". worker pid:" . $worker->pid . "\n";
    // 将返回消息推送到消息队列
    $worker->push($ret);
    $worker->exit(0); // 退出子进程
}, false, false);   // 关闭管道
// 调用 useQueue(1, 2 | \Swoole\Process::IPC_NOWAIT 表示以阻塞模式进行通信
$process->useQueue(1, 2 | \Swoole\Process::IPC_NOWAIT);
// 从主进程将命令推送到消息队列
$process->push('php --version');
// 从消息队列读取返回消息
$msg = $process->pop();
echo 'Message from worker process: '.$msg;

// 启动子进程
$process->start();

swoole_process:wait(); // 要调用这段代码，否则子进程中的push或pop可能会报错