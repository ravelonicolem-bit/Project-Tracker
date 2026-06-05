<?php

namespace Modules\Projects\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Modules\Projects\Enums\ProjectStatus;

class CreateProjectController extends Controller
{
    public function __invoke(): View
    {
        return view('projects::create', [
            'statuses' => ProjectStatus::cases(),
        ]);
    }
}
