@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tasks List</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Assigned To</th>
                <th>Assigned By</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->assignedTo->name }}</td> 
                    <td>{{ $task->assignedBy->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tasks->links() }} 
</div>
@endsection