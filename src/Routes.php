<?php

declare(strict_types=1);

namespace Zeshankhattak\XentralExercise;

use Zeshankhattak\XentralExercise\Controllers\Admin\PostController;
use Zeshankhattak\XentralExercise\Controllers\HomeController;
use Zeshankhattak\XentralExercise\Controllers\Auth\LoginController;
use Zeshankhattak\XentralExercise\Controllers\Admin\LogoutController;
use Symfony\Component\Translation\Exception\NotFoundResourceException;
use Zeshankhattak\XentralExercise\Controllers\Auth\RegisterController;
use Zeshankhattak\XentralExercise\Controllers\Admin\DashboardController;
use Zeshankhattak\XentralExercise\Controllers\PostController as FrontPostController;

class Routes
{
    private string $route;

    public function __construct()
    {
       $this->mapController();
    }

    private function mapController()
    {
        $classAndMethod = $this->lookupRoute($this->getSegment());
        $class = $classAndMethod[0];
        $class = new $class();

        if(count($classAndMethod) == 1) {
            $this->route = $class->__invoke();
            return;
        }

        $this->route = $class->{$classAndMethod[1]}();
    }

    private function lookupRoute(array $uri): array
    {
        $routesMapping = $this->mapRoutes();

        if(!$uri) {
            return $routesMapping['/'];
        }

        $uri = implode('/', $uri);

        if(!isset($routesMapping[$uri])) {
            throw new NotFoundResourceException('Page Not Found');
        }

        return $routesMapping[$uri];
    }

    private function mapRoutes(): array
    {
        return [
            '/' => [HomeController::class],
            'login' => [LoginController::class, 'showForm'],
            'login/authenticate' => [LoginController::class, 'authenticate'],
            'register' => [RegisterController::class, 'showForm'],
            'register/create' => [RegisterController::class, 'store'],
            'admin' => [DashboardController::class],
            'admin/dashboard' => [DashboardController::class],
            'admin/logout' => [LogoutController::class],
            'admin/posts/create' => [PostController::class, 'create'],
            'admin/posts/store' => [PostController::class, 'store'],
            'posts/show' => [FrontPostController::class, 'show'],
        ];
    }

    private function getSegment(): array
    {
        return array_filter(
            explode('/',
                strtok($_SERVER["REQUEST_URI"], '?')
            )
        );
    }

    public function __toString()
    {
        return $this->route;
    }
}
