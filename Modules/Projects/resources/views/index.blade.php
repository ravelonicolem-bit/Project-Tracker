@extends('layouts::app')

@section('title', 'Projects')
@section('header', 'Projects')

@section('content')
    @include('projects::partials.search-filters')

    @include('projects::partials.table')
@endsection
