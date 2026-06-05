<div class="rounded-2xl border border-blue-200 bg-gradient-to-br from-blue-50 to-indigo-50 p-6 shadow-sm dark:border-blue-900 dark:from-blue-950 dark:to-indigo-950">
    <h3 class="text-sm font-semibold uppercase tracking-wide text-blue-800 dark:text-blue-300">Revenue Sharing</h3>
    <dl class="mt-4 space-y-4">
        <div>
            <dt class="text-sm text-gray-600 dark:text-gray-400">Percent Share (per member)</dt>
            <dd class="text-2xl font-bold text-blue-700 dark:text-blue-300">{{ number_format($project->percent_share, 2) }}%</dd>
        </div>
        <div>
            <dt class="text-sm text-gray-600 dark:text-gray-400">Share Amount (per member)</dt>
            <dd class="text-2xl font-bold text-blue-700 dark:text-blue-300">₱{{ number_format($project->share_amount, 2) }}</dd>
        </div>
    </dl>
</div>
