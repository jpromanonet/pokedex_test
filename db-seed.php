<?php

if (php_sapi_name() !== 'cli') {
    exit;
}
require __DIR__ . '/vendor/autoload.php';

use App\Commands\DbSeedCommand;

$seedCommand = new DbSeedCommand();
$seedCommand->run();
?>