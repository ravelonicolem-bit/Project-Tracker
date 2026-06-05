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
            <dd class="mt-1"><x-components::status-badge :status="$project->status" /></dd>
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
