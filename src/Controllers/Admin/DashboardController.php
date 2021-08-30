<?php

declare(strict_types=1);

namespace Zeshankhattak\XentralExercise\Controllers\Admin;

use Jenssegers\Blade\Blade;
use Zeshankhattak\XentralExercise\Traits\CheckAuthTrait;
use Zeshankhattak\XentralExercise\Controllers\BaseController;
use PDO;

class DashboardController extends BaseController
{
    use CheckAuthTrait;

    public function __invoke(): string
    {
        $sql = 'SELECT p.*, a.name
        FROM posts p
        JOIN authors a ON p.author_id = a.id
        ORDER BY created_at DESC';

        $q = $this->pdo->prepare($sql);
        $q->execute();
        $posts = $q->fetchAll(PDO::FETCH_CLASS);

        return $this->blade->render('admin.dashboard', [
            'posts' => $posts
        ]);
    }
}