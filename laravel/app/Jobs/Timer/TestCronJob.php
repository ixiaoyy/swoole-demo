<?php

namespace App\Jobs\Timer;

use Hhxsv5\LaravelS\Swoole\Timer\CronJob;
use Illuminate\Support\Facades\Log;

class TestCronJob extends CronJob
{
    protected $i = 0;

    public function run()
    {
        Log::info(__METHOD__, ['start', $this->i, microtime(true)]);
        $this->i ++;
        Log::info(__METHOD__, ['end', $this->i, microtime(true)]);

        if ($this->i == 3) {
            Log::info(__METHOD__, ['stop', $this->i, microtime(true)]);
            $this->stop();
        }
    }

    // 每隔 1s 执行一次
    public function interval()
    {
        return 1000;
    }

    // 是否是在设置之后立即触发 run 方法执行
    public function isImmediate()
    {
        return false;
    }
}
