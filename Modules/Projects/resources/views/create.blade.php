@extends('layouts::app')

@section('title', 'Create Project')
@section('header', 'Create Project')

@section('content')
    <form method="POST" action="{{ route('projects.store') }}" class="space-y-6">
        @csrf
        @include('projects::partials.form', ['statuses' => $statuses])
        <div class="flex gap-3">
            <button type="submit" class="rounded-lg bg-blue-600 px-6 py-2.5 text-sm font-medium text-white shadow-sm hover:bg-blue-700">Create Project</button>
            <a href="{{ route('projects.index') }}" class="rounded-lg border border-gray-300 px-6 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-800">Cancel</a>
        </div>
    </form>
@endsection
