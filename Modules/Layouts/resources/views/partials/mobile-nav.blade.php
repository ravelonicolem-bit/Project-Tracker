<nav class="fixed bottom-0 left-0 right-0 z-30 flex border-t border-gray-200 bg-white lg:hidden dark:border-gray-800 dark:bg-gray-900">
    <a href="{{ route('dashboard') }}" class="flex flex-1 flex-col items-center gap-1 py-3 text-xs {{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-gray-500' }}">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        Dashboard
    </a>
    <a href="{{ route('projects.index') }}" class="flex flex-1 flex-col items-center gap-1 py-3 text-xs {{ request()->routeIs('projects.*') ? 'text-blue-600' : 'text-gray-500' }}">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        Projects
    </a>
</nav>
