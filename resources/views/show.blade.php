{{-- Method to extend the layout of the app view --}}@extends('layouts.app')

{{-- Method To declear the title of the section --}}
@section('title')
    <h3>Title: {{ $tasks->title }}</h3>
@endsection

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.index') }}" 
        class="font-medium text-gray-700 underline decoration-red-500"><< Go Back to the task list</a>
    </nav>

    <p class="mb-4 text-slate-700">Description: {{ $tasks->description }}</p>
        @if($tasks->long_description)
            <div  class="mb-4 text-slate-700">Long Description: {{ $tasks->long_description }}</div>
        @else
            <p>No Description</p>
        @endif

        @if($tasks->created_at)
            <p class="mb-4 text-slate-700 ">Created AT: {{$tasks->created_at}}</p> (||) <p>Updated AT: {{$tasks->updated_at}}</p>

        @else
            <p>No Time Duration</p>
        @endif

        <p>
            @if($tasks->completed)
               <span class="font-medium text-green-500">Completed</span> 
            @else 
            <span class="font-medium text-red-500"> Not Completed</span> 
            @endif
        </p>

        <div class="flex gap-2">
            {{-- no need for ID laravel will pick it from tasks method object --}}
            <a class="rounded-md px-2 py-1 text-center text-slate-700 font-medium shadown-sm ring-1 ring-slate-700/10 hover:bg-slate-50" href="{{ route('tasks.edit', ['task' => $tasks]) }}">Edit</a> 

            <form action="{{ route('tasks.toggle-complete', ['task' => $tasks] )}}" method="post">
                @csrf
                @method('PUT')
                <button class="rounded-md px-2 py-1 text-center text-slate-700 font-medium shadown-sm ring-1 ring-slate-700/10 hover:bg-slate-50"class="rounded-md px-2 py-1 text-center text-slate-700 font-medium shadown-sm ring-1 ring-slate-700/10 hover:bg-slate-50"  type="submit">
                    Mark as {{ $tasks->completed ? 'not completed' : 'completed'}}
                    {{-- first check if it is completed then when clicked it will change to not completed --}}
                </button>
            </form>

            <form action="{{ route('tasks.destroy', ['task' => $tasks->id])  }}" method="POST">
            @csrf
            @method('DELETE')
                <button class="rounded-md px-2 py-1 text-center text-slate-700 font-medium shadown-sm ring-1 ring-slate-700/10 hover:bg-slate-50"class="rounded-md px-2 py-1 text-center text-slate-700 font-medium shadown-sm ring-1 ring-slate-700/10 hover:bg-slate-50" type="submit"> Delete Task</button>
            </form>
    </div>
@endsection

