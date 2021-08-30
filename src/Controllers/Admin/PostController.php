<?php

declare(strict_types=1);

namespace Zeshankhattak\XentralExercise\Controllers\Admin;

use Jenssegers\Blade\Blade;
use Zeshankhattak\XentralExercise\Traits\CheckAuthTrait;
use Zeshankhattak\XentralExercise\Controllers\BaseController;
use PDO;

class PostController extends BaseController
{
    use CheckAuthTrait;

    public function show(): string
    {
        $slug = $_GET['slug'] ?? null;
        try {
            $q = $this->pdo->prepare('SELECT p.*, a.name from posts p join authors a ON a.id = p.author_id WHERE slug=:slug');
            $q->execute(['slug' => $slug]);
            $post = $q->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw new $e;
        }

        return $this->blade->render('post', [
            'post' => $post,
        ]);
    }

    public function create(): string
    {
        $q = $this->pdo->prepare('SELECT * FROM authors ORDER BY name ASC');
        $q->execute();
        $authors = $q->fetchAll(PDO::FETCH_CLASS);

        return $this->blade->render('admin.posts.create', [
            'authors' => $authors
        ]);
    }

    public function store()
    {
        //@todo: sanitize form fields before passing it to DB
        $author_id = filter_var($_POST['author_id'], FILTER_SANITIZE_NUMBER_INT);
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $excerpt = filter_var($_POST['excerpt'], FILTER_SANITIZE_STRING);
        $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
        $slug = $this->createSlug($title);

        try {
            $query = $this->pdo->prepare('INSERT INTO posts (author_id, title, slug, excerpt, content) VALUES (?, ?, ?, ?, ?)');
            $query->execute([$author_id, $title, $slug, $excerpt, $content]);
        } catch (\Exception $e) {
            throw $e;
        }

        $_SESSION['message'] = 'Post successfully created.';
        header('Location:' . URL . '/admin', true, 302);
    }

    protected function createSlug(string $title): string
    {
        return preg_replace("/-$/", "",
            preg_replace('/[^a-z0-9]+/i',"-", strtolower($title))
        );
    }
}