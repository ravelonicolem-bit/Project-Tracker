@extends('layouts.app')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
@endpush

@section('content')
    <div class="grid gap-4 pb-20 sm:grid-cols-2 xl:grid-cols-4 lg:pb-0">
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-900">
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Projects</p>
            <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($totalProjects) }}</p>
        </div>
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-900">
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Revenue</p>
            <p class="mt-2 text-3xl font-bold text-green-600 dark:text-green-400">${{ number_format($totalRevenue, 2) }}</p>
        </div>
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-900">
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Average Project Value</p>
            <p class="mt-2 text-3xl font-bold text-blue-600 dark:text-blue-400">${{ number_format($averageProjectValue, 2) }}</p>
        </div>
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-900">
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Completed Projects</p>
            <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($completedProjects) }}</p>
        </div>
    </div>

    <div class="mt-8 grid gap-8 lg:grid-cols-2">
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-900">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Revenue Chart</h2>
            <div class="mt-4 h-64">
                <canvas id="revenueChart"
                        data-labels='@json($chartLabels)'
                        data-values='@json($chartData)'></canvas>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-gray-900">
            <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4 dark:border-gray-800">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Latest Projects</h2>
                <a href="{{ route('projects.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-700 dark:text-blue-400">View all</a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
                    <thead class="bg-gray-50 dark:bg-gray-800/50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Project</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Date Created</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                        @forelse ($latestProjects as $project)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50">
                                <td class="whitespace-nowrap px-6 py-4">
                                    <a href="{{ route('projects.show', $project) }}" class="font-medium text-blue-600 hover:underline dark:text-blue-400">{{ $project->project_name }}</a>
                                    <p class="text-xs text-gray-500">{{ $project->client_name }}</p>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm">${{ number_format($project->total_price, 2) }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-600 dark:text-gray-400">{{ $project->displayDateCreated() }}</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <x-status-badge :status="$project->status" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-sm text-gray-500">No projects yet. <a href="{{ route('projects.create') }}" class="text-blue-600 hover:underline">Create one</a>.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
