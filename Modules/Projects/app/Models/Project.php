<?php

namespace Modules\Projects\Models;

use Database\Factories\ProjectFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Modules\Projects\Enums\ProjectStatus;

class Project extends Model
{
    /** @use HasFactory<ProjectFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'project_name',
        'client_name',
        'description',
        'total_price',
        'team_members',
        'percent_share',
        'share_amount',
        'status',
        'date_created',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'total_price' => 'decimal:2',
            'percent_share' => 'decimal:2',
            'share_amount' => 'decimal:2',
            'team_members' => 'integer',
            'status' => ProjectStatus::class,
            'date_created' => 'date',
        ];
    }

    protected static function newFactory(): ProjectFactory
    {
        return ProjectFactory::new();
    }

    public function effectiveDateCreated(): Carbon
    {
        return $this->date_created ?? $this->created_at;
    }

    public function displayDateCreated(): string
    {
        return $this->effectiveDateCreated()->format('M d, Y');
    }
}
