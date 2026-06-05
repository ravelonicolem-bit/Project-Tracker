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
