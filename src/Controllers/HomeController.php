<?php

declare(strict_types=1);

namespace Zeshankhattak\XentralExercise\Controllers;

use Jenssegers\Blade\Blade;

class HomeController extends BaseController
{
    protected int $recordsPerPage;

    public function __construct()
    {
        parent::__construct();
        $this->recordsPerPage = 5;
    }

    public function __invoke(): string
    {
        $page = isset($_GET['page']) ? filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT) : 1;
        $offset = ($page - 1) * $this->recordsPerPage;

        $totalRecords = $this->pdo->query('select count(*) from posts')->fetchColumn();
        $query = $this->pdo->prepare("SELECT * from posts order by created_at desc limit {$offset}, $this->recordsPerPage");
        $query->execute();
        $posts = $query->fetchAll(\PDO::FETCH_CLASS);

        $totalPages = floor($totalRecords / $this->recordsPerPage);

        return $this->blade->render('home', [
            'posts' => $posts,
            'records_per_page' => $this->recordsPerPage,
            'total_records' => $totalRecords,
            'total_pages' => $totalPages,
            'active_page' => $page,
        ]);
    }

}