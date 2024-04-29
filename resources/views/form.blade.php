@extends('layouts.app')
{{-- #If you  the task values from the database is present it should be edit task else it should be Add Task --}}
@section('title', isset($task)? 'Edit Task' : 'Add Task') 

{{-- @section('styles')
    <style>
        .error-message{
            color: red;
            font-weight: bolder
        }
    </style>
@endsection --}}

@section('content')
    <form method="post" action="{{ isset($task)? route('tasks.update', ['task'=> $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task) 
        @method('PUT')
        @endisset
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}">
            @error('title')
            <p class="error"> {{ $message}}</p>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5">{{ $task->description ?? old ('description')}}</textarea>
            @error('description')
            <p class="error">{{ $message}}</p>
            @enderror
        </div>

        <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10">{{ $task->long_description ?? old ('long_description')}}</textarea>
            @error('long_description')
            <p class="error"> {{ $message}}</p>
            @enderror
        </div>

        <div class="flex gap-2 items-center">
            <button  class="rounded-md px-2 py-1 text-center text-slate-700 font-medium shadown-sm ring-1 ring-slate-700/10 hover:bg-slate-50"  type="submit">
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>
            <a href="{{ route('tasks.index')}}" class="link">Cancel</a>
        </div>
    </form>

@endsection



<h3>This is the create blade viewd</h3>