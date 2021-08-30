<?php

declare(strict_types=1);

namespace Zeshankhattak\XentralExercise\Controllers;

use Jenssegers\Blade\Blade;
use Symfony\Component\Translation\Exception\NotFoundResourceException;
use PDO;

class PostController extends BaseController
{
    public function show(): string
    {
        $slug = $_GET['slug'] ?? null;
        if(!$slug) {
            throw new NotFoundResourceException('Post not found.');
        }

        try {
            $q = $this->pdo->prepare('SELECT p.*, a.name from posts p join authors a ON a.id = p.author_id WHERE slug=:slug');
            $q->execute(['slug' => $slug]);
            $post = $q->fetch(PDO::FETCH_ASSOC);

            if(!$post) {
                throw new NotFoundResourceException('Post not found');
            }
        } catch (\Exception $e) {
            throw new $e;
        }

        return $this->blade->render('post', [
            'post' => $post,
        ]);
    }
}