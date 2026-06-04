@props(['project' => null, 'statuses'])

<div class="grid gap-8 lg:grid-cols-3">
    <div class="lg:col-span-2">
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-900" data-revenue-form>
            <div class="grid gap-5 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label for="project_name" class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">Project Name</label>
                    <input type="text" name="project_name" id="project_name" value="{{ old('project_name', $project?->project_name) }}" required
                           class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                    @error('project_name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="client_name" class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">Client Name</label>
                    <input type="text" name="client_name" id="client_name" value="{{ old('client_name', $project?->client_name) }}" required
                           class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                    @error('client_name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="description" class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                    <textarea name="description" id="description" rows="4"
                              class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">{{ old('description', $project?->description) }}</textarea>
                    @error('description')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="total_price" class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">Total Price</label>
                    <input type="number" name="total_price" id="total_price" data-total-price step="0.01" min="0" value="{{ old('total_price', $project?->total_price ?? 0) }}" required
                           class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                    @error('total_price')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="date_created" class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">Date Created</label>
                    <input type="date" name="date_created" id="date_created" required
                           value="{{ old('date_created', $project ? ($project->date_created?->format('Y-m-d') ?? $project->created_at?->format('Y-m-d')) : '') }}"
                           class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                    @error('date_created')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="team_members" class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">Team Members</label>
                    <input type="number" name="team_members" id="team_members" data-team-members min="1" max="100" value="{{ old('team_members', $project?->team_members ?? 2) }}" required
                           class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                    @error('team_members')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="status" class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                    <select name="status" id="status" required
                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        @foreach ($statuses as $statusOption)
                            <option value="{{ $statusOption->value }}" @selected(old('status', $project?->status?->value ?? 'Pending') === $statusOption->value)>
                                {{ $statusOption->value }}
                            </option>
                        @endforeach
                    </select>
                    @error('status')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="sticky top-24 rounded-2xl border border-blue-200 bg-gradient-to-br from-blue-50 to-indigo-50 p-6 shadow-sm dark:border-blue-900 dark:from-blue-950 dark:to-indigo-950">
            <h3 class="text-sm font-semibold uppercase tracking-wide text-blue-800 dark:text-blue-300">Live Calculation</h3>
            <dl class="mt-4 space-y-4">
                <div>
                    <dt class="text-sm text-gray-600 dark:text-gray-400">Percent Share</dt>
                    <dd data-percent-share class="mt-1 text-2xl font-bold text-blue-700 dark:text-blue-300">0.00%</dd>
                </div>
                <div>
                    <dt class="text-sm text-gray-600 dark:text-gray-400">Share Amount</dt>
                    <dd data-share-amount class="mt-1 text-2xl font-bold text-blue-700 dark:text-blue-300">$0.00</dd>
                </div>
            </dl>
            <p class="mt-4 text-xs text-gray-500 dark:text-gray-400">Share = Total Price × (Percent Share ÷ 100)</p>
        </div>
    </div>
</div>
