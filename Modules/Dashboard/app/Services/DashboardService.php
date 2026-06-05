<?php

namespace Modules\Dashboard\Services;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Modules\Projects\Enums\ProjectStatus;

class DashboardService
{
    /**
     * @return array{
     *     totalProjects: int,
     *     totalRevenue: float,
     *     averageProjectValue: float,
     *     completedProjects: int,
     *     latestProjects: Collection<int, Project>,
     *     chartLabels: Collection<int, string>,
     *     chartData: Collection<int, float|int>
     * }
     */
    public function getDashboardData(): array
    {
        $totalProjects = Project::count();
        $totalRevenue = (float) Project::sum('total_price');
        $averageProjectValue = $totalProjects > 0 ? $totalRevenue / $totalProjects : 0;
        $completedProjects = Project::query()
            ->where('status', ProjectStatus::Completed->value)
            ->count();

        $latestProjects = Project::query()->orderByDesc('date_created')->limit(5)->get();

        $chartLabels = Project::query()
            ->orderByDesc('date_created')
            ->get()
            ->groupBy(fn (Project $project) => $project->effectiveDateCreated()->format('Y-m'))
            ->sortKeys()
            ->take(-12)
            ->map(fn ($group, string $monthKey) => (object) [
                'month_label' => Carbon::createFromFormat('Y-m', $monthKey)->format('M Y'),
                'revenue' => $group->sum('total_price'),
            ])
            ->values();

        if ($chartLabels->isEmpty()) {
            $chartLabels = collect([
                (object) ['month_label' => now()->format('M Y'), 'revenue' => 0],
            ]);
        }

        return [
            'totalProjects' => $totalProjects,
            'totalRevenue' => $totalRevenue,
            'averageProjectValue' => $averageProjectValue,
            'completedProjects' => $completedProjects,
            'latestProjects' => $latestProjects,
            'chartLabels' => $chartLabels->pluck('month_label'),
            'chartData' => $chartLabels->pluck('revenue'),
        ];
    }
}
