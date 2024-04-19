{{-- Method to extend the layout of the app view --}}@extends('layouts.app')

{{-- Method To declear the title of the section --}}
@section('title')
    <h3>Title: {{ $result->title }}</h3>
@endsection

@section('content')
    <div>Description: {{ $result->description }}</div>
    @if($result->long_description)
        <div>Long Description: {{ $result->long_description }}</div>
    @else
        <p>No Description</p>
    @endif
@endsection

