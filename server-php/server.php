<?php

require_once __DIR__ . '/vendor/autoload.php';

use Workerman\Worker;
use PHPSocketIO\SocketIO;

$band = false;
// listen port 2021 for socket.io client
$io = new SocketIO(3000);

$io->on('connection', function($socket)use($io){
  $socket->on('new-message', function($msg)use($io){
    $io->emit('new-message', $msg);
  });
  if($band == true){
    $io->emit('new-message', 'jsajkdfjaksdjkajksdjks');
  }
});

Worker::runAll();

$band = true;

?>