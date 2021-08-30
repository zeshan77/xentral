<?php

declare(strict_types=1);

namespace Zeshankhattak\XentralExercise\Controllers;

use Jenssegers\Blade\Blade;
use PDO;
use Zeshankhattak\XentralExercise\DBConnection;

abstract class BaseController
{
    protected Blade $blade;

    protected PDO $pdo;

    public function __construct()
    {
        $this->blade = new Blade('views', 'cache');
        $dbConnection = new DBConnection();
        $this->pdo = $dbConnection->dbConnection;

        ini_set('memory_limit', '1G');
    }
}