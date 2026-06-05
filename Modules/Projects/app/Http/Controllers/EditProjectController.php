<?php

namespace Modules\Projects\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\View\View;
use Modules\Projects\Enums\ProjectStatus;

class EditProjectController extends Controller
{
    public function __invoke(Project $project): View
    {
        return view('projects::edit', [
            'project' => $project,
            'statuses' => ProjectStatus::cases(),
        ]);
    }
}
