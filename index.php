<?php
declare(strict_types = 1);

use Dotenv\Dotenv;
use Zeshankhattak\XentralExercise\Routes;
use Symfony\Component\Translation\Exception\NotFoundResourceException;
use Zeshankhattak\XentralExercise\Controllers\Exceptions\NotFoundController;
use Zeshankhattak\XentralExercise\Controllers\Exceptions\InternalServerController;

require './vendor/autoload.php';

session_start();

define('URL', getenv('URL'));

$dotenv = Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

try {
    echo new Routes();

} catch (NotFoundResourceException $e) {
    $notFound = new NotFoundController();
    echo $notFound();
} catch (\Exception $e) {
    $serverError = new InternalServerController();
    echo $serverError();
}
