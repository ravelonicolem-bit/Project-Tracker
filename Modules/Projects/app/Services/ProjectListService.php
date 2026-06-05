<?php

namespace Modules\Projects\Services;

use App\Models\Project;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class ProjectListService
{
    public function paginate(Request $request): LengthAwarePaginator
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

        return $query->paginate(10)->withQueryString();
    }
}
