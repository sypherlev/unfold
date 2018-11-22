<?php

if (php_sapi_name() != "cli") {
    die("Restricted to command line access only.");
}

$autoload = null;

$autoloadFiles = [
    __DIR__ . '/../vendor/autoload.php',
    __DIR__ . '/../../../autoload.php'
];

foreach ($autoloadFiles as $autoloadFile) {
    if (file_exists($autoloadFile)) {
        $autoload = realpath($autoloadFile);
        break;
    }
}

if (! $autoload) {
    echo "Autoload file not found; try 'composer dump-autoload' first." . PHP_EOL;
    exit(1);
}

require $autoload;

array_shift($argv);

$unfold = new \SypherLev\Unfold\Unfold();
$unfold->build($argv);