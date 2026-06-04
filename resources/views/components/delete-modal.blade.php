<div data-delete-modal class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4">
    <div class="w-full max-w-md rounded-2xl bg-white p-6 shadow-xl dark:bg-gray-900">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Confirm Delete</h3>
        <p data-delete-message class="mt-2 text-sm text-gray-600 dark:text-gray-400"></p>
        <div class="mt-6 flex justify-end gap-3">
            <button type="button" data-delete-cancel class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-800">
                Cancel
            </button>
            <form data-delete-form method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-red-700">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
