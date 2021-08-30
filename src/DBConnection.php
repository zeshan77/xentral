<?php

declare(strict_types=1);

namespace Zeshankhattak\XentralExercise;

use PDO;

class DBConnection
{
    public PDO $dbConnection;

    public string $dsn;
    public string $username;
    public string $password;

    public function __construct()
    {
        $this->dsn = "mysql:dbname=".getenv('DB_NAME').";host=".getenv('DB_HOST');

        $this->username = getenv('DB_USERNAME');
        $this->password = getenv('DB_PASSWORD');

        $this->openConnection();
    }

    public function openConnection()
    {
        $this->dbConnection = $this->dbConnection = new PDO($this->dsn, $this->username, $this->password);
    }
}