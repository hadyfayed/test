<?php declare(strict_types=1);

define('DS', DIRECTORY_SEPARATOR);

// Class autoload
require __DIR__ . '/../../vendor/autoload.php';

use mzdr\OhSnap\Formatter\PrettyFormatter;

////////////////////
// 1. CONFIGURATION
////////////////////
///  1.1. ENV loader
try {
    Dotenv\Dotenv::create(base_path())->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    die($e);
}

try {
    (new League\BooBoo\BooBoo([new PrettyFormatter]))->register();
} catch (\League\BooBoo\Exception\NoFormattersRegisteredException $e) {
    die($e);
}

$container = \MediSoft\App::instance();

require base_path(DS.'app'.DS.'routes.php');

\MediSoft\App::run();
