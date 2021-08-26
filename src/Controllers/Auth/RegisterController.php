<?php

namespace Zeshankhattak\XentralExercise\Controllers\Auth;

use Zeshankhattak\XentralExercise\DBConnection;
use Zeshankhattak\XentralExercise\Traits\AuthTrait;
use Zeshankhattak\XentralExercise\Controllers\BaseController;
use PDO;

class RegisterController extends BaseController
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
        return $this->blade->render('auth.register');
    }

    public function store()
    {
        if(!$_POST['register']) {
            header('Location:' . URL . '/register', true, 302);
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = crypt($_POST['password'], getenv('SALT'));

        if($this->ifUserExists($email)) {
            $_SESSION['errors'] = ['Email already exists'];

            header('Location:'. URL . '/register', true, 302);
            exit;
        }

        try {
            $sql = "INSERT INTO users (name, email, password) VALUES (?,?,?)";
            $stmt= $this->pdo->prepare($sql);
            $stmt->execute([$name, $email, $password]);

        } catch (\Exception $e) {
            return $this->blade->render('auth.register', ['errors' => [$e->getMessage()]]);
        }

        $_SESSION['message'] = 'Account successfully created. Please login now.';
        header('Location:' . URL . '/login', true, 302);

    }
}