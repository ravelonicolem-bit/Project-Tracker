<?php

namespace App\Http\Controllers;

use App\Enums\ProjectStatus;
use App\Exports\ProjectsExport;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ProjectController extends Controller
{
    public function dashboard(): View
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
                'month_label' => \Carbon\Carbon::createFromFormat('Y-m', $monthKey)->format('M Y'),
                'revenue' => $group->sum('total_price'),
            ])
            ->values();

        if ($chartLabels->isEmpty()) {
            $chartLabels = collect([
                (object) ['month_label' => now()->format('M Y'), 'revenue' => 0],
            ]);
        }

        return view('dashboard', [
            'totalProjects' => $totalProjects,
            'totalRevenue' => $totalRevenue,
            'averageProjectValue' => $averageProjectValue,
            'completedProjects' => $completedProjects,
            'latestProjects' => $latestProjects,
            'chartLabels' => $chartLabels->pluck('month_label'),
            'chartData' => $chartLabels->pluck('revenue'),
        ]);
    }

    public function index(Request $request): View
    {
        $query = Project::query();

        if ($request->filled('project_name')) {
            $query->where('project_name', 'like', '%'.$request->string('project_name').'%');
        }

        if ($request->filled('client_name')) {
            $query->where('client_name', 'like', '%'.$request->string('client_name').'%');
        }

        $sort = $request->string('sort', 'latest')->toString();

        match ($sort) {
            'oldest' => $query->orderBy('date_created'),
            'price' => $query->orderByDesc('total_price'),
            default => $query->orderByDesc('date_created'),
        };

        $projects = $query->paginate(10)->withQueryString();

        return view('projects.index', compact('projects'));
    }

    public function create(): View
    {
        return view('projects.create', [
            'statuses' => ProjectStatus::cases(),
        ]);
    }

    public function store(StoreProjectRequest $request): RedirectResponse
    {
        Project::create($request->validated());

        return redirect()
            ->route('projects.index')
            ->with('toast', ['type' => 'success', 'message' => 'Project created successfully.']);
    }

    public function show(Project $project): View
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project): View
    {
        return view('projects.edit', [
            'project' => $project,
            'statuses' => ProjectStatus::cases(),
        ]);
    }

    public function update(UpdateProjectRequest $request, Project $project): RedirectResponse
    {
        $project->update($request->validated());

        return redirect()
            ->route('projects.index')
            ->with('toast', ['type' => 'success', 'message' => 'Project updated successfully.']);
    }

    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        return redirect()
            ->route('projects.index')
            ->with('toast', ['type' => 'success', 'message' => 'Project deleted successfully.']);
    }

    public function export(): BinaryFileResponse
    {
        return Excel::download(new ProjectsExport, 'projects-'.now()->format('Y-m-d').'.xlsx');
    }
}
