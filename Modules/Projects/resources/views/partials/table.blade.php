<div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-gray-900">
    <div class="overflow-x-auto pb-20 lg:pb-0">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
            <thead class="bg-gray-50 dark:bg-gray-800/50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Project Name</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Client</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Total Price</th>
                    <th class="hidden px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 md:table-cell">Team</th>
                    <th class="hidden px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 lg:table-cell">% Share</th>
                    <th class="hidden px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 lg:table-cell">Share Amt</th>
                    <th class="hidden px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 md:table-cell">Date Created</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Status</th>
                    <th class="px-4 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                @forelse ($projects as $project)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50">
                        <td class="whitespace-nowrap px-4 py-4 text-sm font-medium">{{ $project->project_name }}</td>
                        <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-600 dark:text-gray-400">{{ $project->client_name }}</td>
                        <td class="whitespace-nowrap px-4 py-4 text-sm">₱{{ number_format($project->total_price, 2) }}</td>
                        <td class="hidden whitespace-nowrap px-4 py-4 text-sm md:table-cell">{{ $project->team_members }}</td>
                        <td class="hidden whitespace-nowrap px-4 py-4 text-sm lg:table-cell">{{ number_format($project->percent_share, 2) }}%</td>
                        <td class="hidden whitespace-nowrap px-4 py-4 text-sm lg:table-cell">₱{{ number_format($project->share_amount, 2) }}</td>
                        <td class="hidden whitespace-nowrap px-4 py-4 text-sm text-gray-600 dark:text-gray-400 md:table-cell">{{ $project->displayDateCreated() }}</td>
                        <td class="whitespace-nowrap px-4 py-4">
                            <x-components::status-badge :status="$project->status" />
                        </td>
                        <td class="whitespace-nowrap px-4 py-4 text-right text-sm">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('projects.show', $project) }}" class="rounded-lg px-2 py-1 text-blue-600 hover:bg-blue-50 dark:text-blue-400 dark:hover:bg-blue-950">View</a>
                                <a href="{{ route('projects.edit', $project) }}" class="rounded-lg px-2 py-1 text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800">Edit</a>
                                <button type="button"
                                        data-delete-trigger
                                        data-delete-url="{{ route('projects.destroy', $project) }}"
                                        data-project-name="{{ $project->project_name }}"
                                        class="rounded-lg px-2 py-1 text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-950">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="px-4 py-12 text-center text-sm text-gray-500">
                            No projects found.
                            <a href="{{ route('projects.create') }}" class="text-blue-600 hover:underline">Create your first project</a>.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if ($projects->hasPages())
        <div class="border-t border-gray-200 px-4 py-3 dark:border-gray-800">
            {{ $projects->links() }}
        </div>
    @endif
</div>
