<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Projects\Enums\ProjectStatus;
use Modules\Projects\Services\ProjectRevenueService;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $totalPrice = fake()->randomFloat(2, 1000, 500000);
        $teamMembers = fake()->numberBetween(2, 8);
        $revenue = app(ProjectRevenueService::class)->calculate($totalPrice, $teamMembers);

        return [
            'project_name' => fake()->words(3, true),
            'client_name' => fake()->company(),
            'description' => fake()->optional()->paragraph(),
            'total_price' => $totalPrice,
            'team_members' => $teamMembers,
            'percent_share' => $revenue['percent_share'],
            'share_amount' => $revenue['share_amount'],
            'status' => fake()->randomElement(ProjectStatus::cases()),
            'date_created' => fake()->date(),
        ];
    }
}
