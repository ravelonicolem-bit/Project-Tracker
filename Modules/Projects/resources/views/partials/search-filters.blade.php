<div class="mb-6 rounded-2xl border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-800 dark:bg-gray-900">
    <form method="GET" action="{{ route('projects.index') }}" class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <div>
            <label for="project_name" class="mb-1 block text-xs font-medium text-gray-500">Project Name</label>
            <input type="text" name="project_name" id="project_name" value="{{ request('project_name') }}"
                   placeholder="Search project..."
                   class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white">
        </div>
        <div>
            <label for="client_name" class="mb-1 block text-xs font-medium text-gray-500">Client Name</label>
            <input type="text" name="client_name" id="client_name" value="{{ request('client_name') }}"
                   placeholder="Search client..."
                   class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white">
        </div>
        <div>
            <label for="sort" class="mb-1 block text-xs font-medium text-gray-500">Sort By</label>
            <select name="sort" id="sort" class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                <option value="latest" @selected(request('sort', 'latest') === 'latest')>Latest</option>
                <option value="oldest" @selected(request('sort') === 'oldest')>Oldest</option>
                <option value="price" @selected(request('sort') === 'price')>Price (High to Low)</option>
            </select>
        </div>
        <div class="flex items-end gap-2">
            <button type="submit" class="flex-1 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">Search</button>
            <a href="{{ route('projects.index') }}" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-800">Reset</a>
        </div>
    </form>
</div>
