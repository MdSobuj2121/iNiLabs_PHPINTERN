<!-- resources/views/todos/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Your Todo List</h2>

            <!-- Display Success Message -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Todo List UI -->
            <ul class="list-group mb-4">
                @forelse ($todos as $index => $todo)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $todo }}
                        <span>
                            <!-- Edit Todo -->
                            <form action="{{ route('todos.update', $index) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <input type="text" name="todo" value="{{ $todo }}" class="form-control d-inline-block w-auto" required>
                                <button class="btn btn-sm btn-primary" type="submit">Edit</button>
                            </form>
                            <!-- Delete Todo -->
                            <form action="{{ route('todos.destroy', $index) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </span>
                    </li>
                @empty
                    <li class="list-group-item">No Todos found.</li>
                @endforelse
            </ul>

            <!-- Add Todo Form -->
            <form action="{{ route('todos.store') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="New Todo" name="todo" required>
                    <button class="btn btn-success" type="submit">Add Todo</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
