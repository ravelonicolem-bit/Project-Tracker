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
