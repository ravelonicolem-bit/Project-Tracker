<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Modules\Dashboard\Services\DashboardService;

class DashboardController extends Controller
{
    public function __invoke(DashboardService $dashboardService): View
    {
        return view('dashboard::index', $dashboardService->getDashboardData());
    }
}
