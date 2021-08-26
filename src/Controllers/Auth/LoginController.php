<?php

namespace Zeshankhattak\XentralExercise\Controllers\Auth;

use Zeshankhattak\XentralExercise\DBConnection;
use Zeshankhattak\XentralExercise\Traits\AuthTrait;
use Zeshankhattak\XentralExercise\Controllers\BaseController;
use PDO;

class LoginController extends BaseController
{
    use AuthTrait;

    public PDO $pdo;

    public function __construct()
    {
        parent::__construct();

        $dbConnection = new DBConnection();
        $this->pdo = $dbConnection->dbConnection;
    }

    public function showForm()
    {
        return $this->blade->render('auth.login');
    }

    public function authenticate()
    {
        if(!$_POST['signin']) {
            header('Location:' . URL . '/login', true, 302);
        }


        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!$this->ifUserExists($email)) {
            $_SESSION['errors'] = ['Invalid login credentials.'];
            header('Location:' . URL . '/login', true, 302);
        }

        if(! $user = $this->attempt($email, $password)) {
            $_SESSION['errors'] = ['Invalid login credentials.'];
            header('Location:' . URL . '/login', true, 302);
        }

        header('Location:' . URL . '/admin', true, 302);
    }
}