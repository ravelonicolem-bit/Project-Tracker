<?php

namespace Modules\Projects\Http\Controllers;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Projects\Exports\ProjectsExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportProjectsController extends Controller
{
    public function __invoke(): BinaryFileResponse
    {
        return Excel::download(new ProjectsExport, 'projects.xlsx');
    }
}
