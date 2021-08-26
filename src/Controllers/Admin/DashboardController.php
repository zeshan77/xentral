<?php

namespace Zeshankhattak\XentralExercise\Controllers\Admin;

use Zeshankhattak\XentralExercise\Traits\CheckAuthTrait;
use Zeshankhattak\XentralExercise\Controllers\BaseController;

class DashboardController extends BaseController
{
    use CheckAuthTrait;

    public function __invoke()
    {
        return $this->blade->render('admin.dashboard');
    }
}