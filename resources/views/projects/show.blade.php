@extends('layouts.app')

@section('title', $project->project_name)
@section('header', 'Project Details')

@section('content')
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $project->project_name }}</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">Client: {{ $project->client_name }}</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('projects.edit', $project) }}" class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">Edit</a>
            <button type="button"
                    data-delete-trigger
                    data-delete-url="{{ route('projects.destroy', $project) }}"
                    data-project-name="{{ $project->project_name }}"
                    class="rounded-lg border border-red-300 px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50 dark:border-red-800 dark:text-red-400 dark:hover:bg-red-950">
                Delete
            </button>
            <a href="{{ route('projects.index') }}" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-800">Back</a>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2 space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-900">
                <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-500">Overview</h3>
                <dl class="mt-4 grid gap-4 sm:grid-cols-2">
                    <div>
                        <dt class="text-sm text-gray-500">Project Name</dt>
                        <dd class="mt-1 font-medium">{{ $project->project_name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500">Client Name</dt>
                        <dd class="mt-1 font-medium">{{ $project->client_name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500">Status</dt>
                        <dd class="mt-1"><x-status-badge :status="$project->status" /></dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500">Date Created</dt>
                        <dd class="mt-1 font-medium">{{ $project->displayDateCreated() }}</dd>
                    </div>
                    <div class="sm:col-span-2">
                        <dt class="text-sm text-gray-500">Description</dt>
                        <dd class="mt-1 text-gray-700 dark:text-gray-300">{{ $project->description ?: '—' }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-900">
                <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-500">Financials</h3>
                <dl class="mt-4 space-y-4">
                    <div>
                        <dt class="text-sm text-gray-500">Total Price</dt>
                        <dd class="text-2xl font-bold text-green-600 dark:text-green-400">${{ number_format($project->total_price, 2) }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500">Team Members</dt>
                        <dd class="text-xl font-semibold">{{ $project->team_members }}</dd>
                    </div>
                </dl>
            </div>

            <div class="rounded-2xl border border-blue-200 bg-gradient-to-br from-blue-50 to-indigo-50 p-6 shadow-sm dark:border-blue-900 dark:from-blue-950 dark:to-indigo-950">
                <h3 class="text-sm font-semibold uppercase tracking-wide text-blue-800 dark:text-blue-300">Revenue Sharing</h3>
                <dl class="mt-4 space-y-4">
                    <div>
                        <dt class="text-sm text-gray-600 dark:text-gray-400">Percent Share (per member)</dt>
                        <dd class="text-2xl font-bold text-blue-700 dark:text-blue-300">{{ number_format($project->percent_share, 2) }}%</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-600 dark:text-gray-400">Share Amount (per member)</dt>
                        <dd class="text-2xl font-bold text-blue-700 dark:text-blue-300">${{ number_format($project->share_amount, 2) }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
@endsection
