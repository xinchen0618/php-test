<?php

$server = new Swoole\WebSocket\Server("0.0.0.0", 9501);

$server->on('open', function (Swoole\WebSocket\Server $server, $request) {
    echo "server: handshake success with fd{$request->fd}\n";

    if (2 == $request->fd) {
        $server->close($request->fd);
    }
});

$server->on('message', function (Swoole\WebSocket\Server $server, $frame) {
    echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";

    foreach ($server->connections as $fd) {
        // 需要先判断是否是正确的websocket连接，否则有可能会push失败
        if ($server->isEstablished($fd)) {
            echo "fd:{$fd} push data\n";
            $server->push($fd, $frame->data);
        }
    }
});

$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});

$server->start();
