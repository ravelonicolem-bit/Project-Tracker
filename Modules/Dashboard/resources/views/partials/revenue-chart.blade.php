<div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-900">
    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Revenue Chart</h2>
    <div class="mt-4 h-64">
        <canvas id="revenueChart"
                data-labels='@json($chartLabels)'
                data-values='@json($chartData)'></canvas>
    </div>
</div>
