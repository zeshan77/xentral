<?php

namespace Zeshankhattak\XentralExercise\Models;

use \PDO;

class BaseModel
{
    public PDO dbConnection;

    public string $dsn;
    public string $username;
    public string $password;

    public function __construct()
    {
        /* Connect to a MySQL database using driver invocation */
        $this->dsn = 'mysql:dbname=xentral;host=127.0.0.1';
        $this->username = 'root';
        $this->password = 'cu-W6ner';

        $this->openConnection();
    }

    public function openConnection()
    {
        $this->dbConnection = $this->dbConnection = new PDO($this->dsn, $this->username, $this->password);
    }

    public function closeConnection()
    {

    }
}