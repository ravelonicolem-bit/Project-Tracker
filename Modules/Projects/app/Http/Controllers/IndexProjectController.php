<?php

namespace Modules\Projects\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Projects\Services\ProjectListService;

class IndexProjectController extends Controller
{
    public function __invoke(Request $request, ProjectListService $projectListService): View
    {
        return view('projects::index', [
            'projects' => $projectListService->paginate($request),
        ]);
    }
}
