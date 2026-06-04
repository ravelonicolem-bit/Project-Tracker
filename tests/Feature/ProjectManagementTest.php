<?php

use App\Enums\ProjectStatus;
use App\Models\Project;

test('projects index page loads', function () {
    $this->get(route('projects.index'))->assertOk();
});

test('project can be created with calculated revenue fields and manual date created', function () {
    $response = $this->post(route('projects.store'), [
        'project_name' => 'Website Redesign',
        'client_name' => 'Acme Corp',
        'description' => 'Full redesign',
        'total_price' => 100000,
        'team_members' => 2,
        'date_created' => '2024-03-15',
        'status' => ProjectStatus::Pending->value,
    ]);

    $response->assertRedirect(route('projects.index'));
    $response->assertSessionHas('toast');

    $project = Project::query()->first();

    expect($project)->not->toBeNull()
        ->and((float) $project->percent_share)->toBe(50.0)
        ->and((float) $project->share_amount)->toBe(50000.0)
        ->and($project->date_created->format('Y-m-d'))->toBe('2024-03-15');
});

test('project can be updated with recalculated revenue and manual date created', function () {
    $project = Project::factory()->create([
        'total_price' => 100000,
        'team_members' => 2,
        'percent_share' => 50,
        'share_amount' => 50000,
        'date_created' => '2024-01-01',
    ]);

    $this->put(route('projects.update', $project), [
        'project_name' => $project->project_name,
        'client_name' => $project->client_name,
        'description' => $project->description,
        'total_price' => 120000,
        'team_members' => 4,
        'date_created' => '2025-06-20',
        'status' => ProjectStatus::InProgress->value,
    ])->assertRedirect(route('projects.index'));

    $project->refresh();

    expect((float) $project->percent_share)->toBe(25.0)
        ->and((float) $project->share_amount)->toBe(30000.0)
        ->and($project->status)->toBe(ProjectStatus::InProgress)
        ->and($project->date_created->format('Y-m-d'))->toBe('2025-06-20');
});

test('project can be deleted', function () {
    $project = Project::factory()->create();

    $this->delete(route('projects.destroy', $project))
        ->assertRedirect(route('projects.index'))
        ->assertSessionHas('toast');

    expect(Project::query()->count())->toBe(0);
});

test('projects can be searched by name and client', function () {
    Project::factory()->create(['project_name' => 'Alpha Build', 'client_name' => 'Client A']);
    Project::factory()->create(['project_name' => 'Beta App', 'client_name' => 'Client B']);

    $this->get(route('projects.index', ['project_name' => 'Alpha']))
        ->assertOk()
        ->assertSee('Alpha Build')
        ->assertDontSee('Beta App');

    $this->get(route('projects.index', ['client_name' => 'Client B']))
        ->assertOk()
        ->assertSee('Beta App')
        ->assertDontSee('Alpha Build');
});

test('projects can be sorted by price', function () {
    Project::factory()->create(['project_name' => 'Low', 'total_price' => 1000]);
    Project::factory()->create(['project_name' => 'High', 'total_price' => 9000]);

    $this->get(route('projects.index', ['sort' => 'price']))
        ->assertOk()
        ->assertSeeInOrder(['High', 'Low']);
});

test('projects export returns excel download', function () {
    Project::factory()->count(2)->create();

    $this->get(route('projects.export'))
        ->assertOk()
        ->assertDownload();
});

test('create and edit forms validate required fields', function () {
    $this->post(route('projects.store'), [])->assertSessionHasErrors([
        'project_name',
        'client_name',
        'total_price',
        'team_members',
        'date_created',
        'status',
    ]);
});
