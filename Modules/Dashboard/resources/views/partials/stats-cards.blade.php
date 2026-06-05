<div class="grid gap-4 pb-20 sm:grid-cols-2 xl:grid-cols-4 lg:pb-0">
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-900">
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Projects</p>
        <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($totalProjects) }}</p>
    </div>
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-900">
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Revenue</p>
        <p class="mt-2 text-3xl font-bold text-green-600 dark:text-green-400">₱{{ number_format($totalRevenue, 2) }}</p>
    </div>
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-900">
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Average Project Value</p>
        <p class="mt-2 text-3xl font-bold text-blue-600 dark:text-blue-400">₱{{ number_format($averageProjectValue, 2) }}</p>
    </div>
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-900">
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Completed Projects</p>
        <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($completedProjects) }}</p>
    </div>
</div>
