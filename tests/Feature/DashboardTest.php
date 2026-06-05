<?php

use App\Models\Project;
use Modules\Projects\Enums\ProjectStatus;

test('dashboard is publicly accessible', function () {
    $this->get('/dashboard')->assertOk();
});

test('dashboard displays statistics', function () {
    Project::factory()->count(3)->create([
        'total_price' => 100000,
        'status' => ProjectStatus::Completed,
    ]);

    $this->get('/dashboard')
        ->assertOk()
        ->assertSee('Total Projects')
        ->assertSee('3');
});
