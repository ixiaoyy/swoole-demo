<?php

\Swoole\Timer::tick(1000, function () {
   echo "swoole 好\n";
});