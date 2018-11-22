<?php

if (php_sapi_name() != "cli") {
    die("Restricted to command line access only.");
}

$unfold = new \SypherLev\Unfold\Unfold();
$unfold->build($argv);