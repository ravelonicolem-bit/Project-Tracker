<?php

namespace Modules\Projects\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\View\View;

class ShowProjectController extends Controller
{
    public function __invoke(Project $project): View
    {
        return view('projects::show', [
            'project' => $project,
        ]);
    }
}
