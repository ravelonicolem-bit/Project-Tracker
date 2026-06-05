@extends('layouts::app')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
@endpush

@section('content')
    @include('dashboard::partials.stats-cards')
    @include('dashboard::partials.charts-section')
@endsection
