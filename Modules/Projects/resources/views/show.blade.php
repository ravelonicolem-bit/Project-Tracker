@extends('layouts::app')

@section('title', $project->project_name)
@section('header', 'Project Details')

@section('content')
    @include('projects::partials.show-header')

    <div class="grid gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2 space-y-6">
            @include('projects::partials.overview-card')
        </div>

        <div class="space-y-6">
            @include('projects::partials.financials-card')
            @include('projects::partials.revenue-sharing-card')
        </div>
    </div>
@endsection
