<?php

namespace Modules\Projects\Exports;

use App\Models\Project;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProjectsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return Collection<int, Project>
     */
    public function collection(): Collection
    {
        return Project::query()->orderByDesc('date_created')->get();
    }

    /**
     * @return list<string>
     */
    public function headings(): array
    {
        return [
            'ID',
            'Project Name',
            'Client Name',
            'Description',
            'Total Price',
            'Team Members',
            'Percent Share',
            'Share Amount',
            'Status',
            'Date Created',
        ];
    }

    /**
     * @param  Project  $project
     * @return list<string|int|float|null>
     */
    public function map($project): array
    {
        return [
            $project->id,
            $project->project_name,
            $project->client_name,
            $project->description,
            $project->total_price,
            $project->team_members,
            $project->percent_share,
            $project->share_amount,
            $project->status->value,
            $project->displayDateCreated(),
        ];
    }
}
