@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Task</h2>
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="assignedBy" class="form-label">Admin Name</label>
            <select class="form-control select2" id="assignedBy" name="assigned_by_id" required></select>
        </div>
        <div class="mb-3">
            <label for="assignedTo" class="form-label">Assigned User</label>
            <select class="form-control select2" id="assignedTo" name="assigned_to_id" required></select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#assignedBy').select2({
            width: '100%',
            ajax: {
                url: '/search-admins',
                dataType: 'json',
                delay: 250, 
                data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.data.map(function (item) {
                            return {
                                id: item.id,
                                text: item.name
                            };
                        })
                    };
                },
                cache: true
            },
            placeholder: 'Select an option',
            minimumInputLength: 0,
        });

        $('#assignedTo').select2({
            width: '100%',
            ajax: {
                url: '/search-users',
                dataType: 'json',
                delay: 250, 
                data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.data.map(function (item) {
                            return {
                                id: item.id,
                                text: item.name
                            };
                        })
                    };
                },
                cache: true
            },
            placeholder: 'Select an option',
            minimumInputLength: 0,
        });

    });
</script>

@endsection