<?php

namespace Modules\Projects\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Modules\Projects\Http\Requests\UpdateProjectRequest;

class UpdateProjectController extends Controller
{
    public function __invoke(UpdateProjectRequest $request, Project $project): RedirectResponse
    {
        $project->update($request->validated());

        return redirect()
            ->route('projects.index')
            ->with('toast', ['message' => 'Project updated successfully.']);
    }
}
