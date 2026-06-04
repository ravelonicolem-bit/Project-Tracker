<?php

namespace App\Models;

use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
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

    public function effectiveDateCreated(): Carbon
    {
        return $this->date_created ?? $this->created_at;
    }

    public function displayDateCreated(): string
    {
        return $this->effectiveDateCreated()->format('M d, Y');
    }
}
