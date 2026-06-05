@if (session('toast'))
    <div data-toast-container class="fixed right-4 top-20 z-50">
        <div data-toast class="flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-800 shadow-lg transition duration-300 dark:border-green-800 dark:bg-green-950 dark:text-green-200">
            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            {{ session('toast.message') }}
        </div>
    </div>
@endif
