@extends('layouts.app')
@section('title', "This is the Index Page of the Laravel Application")

@section('content')

@if($tasks)
<h2>Index Page</h2>
<h3>These are the tasks available</h3>
    @foreach($tasks as $output)
    <div class="container">
        <div class="row">
            <a href="{{ route('tasks.show',['id' => $output->id]) }}">
                <div>Title: {{ $output->title }}</div>
                {{-- <div>Description: {{ $output->description }}</div>
                <div>Long Description: {{ $output->long_description }}</div>
                <div>Completed: {{ $output->completed }}</div>
                <div class="d-flex">
                    <div>Completed: {{ $output->created_at }}</div>
                    <div> Updated at {{ $output->updated_at }}</div>
                </div> --}}
            </a>
        </div>
        <br>
        {{-- <hr> --}}
    </div>
    @endforeach
    @else
    <div>There are no available tasks</div>
    @endif

    @isset($name)
    <h3>This is my full name {{ $name }}</h3>
@endisset


@endsection
