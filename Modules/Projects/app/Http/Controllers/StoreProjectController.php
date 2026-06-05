<?php

namespace Modules\Projects\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Modules\Projects\Http\Requests\StoreProjectRequest;

class StoreProjectController extends Controller
{
    public function __invoke(StoreProjectRequest $request): RedirectResponse
    {
        Project::query()->create($request->validated());

        return redirect()
            ->route('projects.index')
            ->with('toast', ['message' => 'Project created successfully.']);
    }
}
