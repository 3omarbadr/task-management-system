@extends('layouts.app')

@section('content')
<div class="container mt-5 d-flex justify-content-center align-items-center">
    <div class="col-md-10">
                <h4>Assigned Tasks ({{ $tasks->count() }})</h4>
        <table class="table">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Admin Name</th>
                    <th scope="col">User Assigend to</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->assignedBy?->name }}</td>
                    <td>{{ $task->assignedTo?->name }}</td>
                </tr>
                @empty
                <p>No Tasks Available</p>
                @endforelse
            </tbody>
        </table>
        {{ $tasks->links() }}
    </div>
    @endsection