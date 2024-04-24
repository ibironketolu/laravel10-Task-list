{{-- Method to extend the layout of the app view --}}@extends('layouts.app')

{{-- Method To declear the title of the section --}}
@section('title')
    <h3>Title: {{ $tasks->title }}</h3>
@endsection

@section('content')
    <div>Description: {{ $tasks->description }}</div>
    @if($tasks->long_description)
        <div>Long Description: {{ $tasks->long_description }}</div>
    @else
        <p>No Description</p>
    @endif
@endsection

