@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>User Id</th>
                <th>User Name</th>
                <th>Number Of Tasks</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statistics as $statistic)
                <tr>
                    <td>{{ $statistic->user_id }}</td>
                    <td>{{ $statistic->user->name }}</td>
                    <td>{{ $statistic->tasks_count }}</td> 
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection