<?php
namespace App\Jobs;

use Hhxsv5\LaravelS\Swoole\Task\Task;
use Illuminate\Support\Facades\Log;

class TestTask extends Task
{
    // 待处理任务数据
    private $data;

    // 任务处理结束
    private $result;

    public function __construct($data)
    {
        $this->data = $data;
    }

    // 任务投递调用 task 回调时触发，等同于 Swoole 中的 onTask 逻辑
    public function handle()
    {
        Log::info(__CLASS__ . '：开始处理任务', [$this->data]);
        sleep(3); // 模拟任务需要3秒
        $this->result = 'The result of ' . $this->data . ' is balabalabala';
    }

    // 任务完成调用 finish 回调时触发，等同于 Swoole 中的 onFinish 逻辑
    public function finish()
    {
        Log::info(__CLASS__ . "：任务处理完成", [$this->result]);
    }
}
