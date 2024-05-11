@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Task</h2>
    <form method="POST" action="{{ route('tasks.create') }}">
        @csrf  {{-- CSRF token protection --}}
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="searchAdmin" class="form-label">Search Admin</label>
            <input type="text" id="searchAdmin" class="form-control">
            <select class="form-select mt-2" id="assignedBy" name="assigned_by_id"></select>
        </div>
        <div class="mb-3">
            <label for="searchUser" class="form-label">Search User</label>
            <input type="text" id="searchUser" class="form-control">
            <select class="form-select mt-2" id="assignedTo" name="assigned_to_id"></select>
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
        $('#searchAdmin').keyup(function() {
            let query = $(this).val();
            $.ajax({
                url: `/search-admins?searchTerm=${query}`,
                type: 'GET',
                success: function(data) {
                    let dropdown = $('#assignedBy');
                    dropdown.empty();
                    $.each(data.data, function(key, admin) {
                        dropdown.append($('<option></option>').attr('value', admin.id).text(admin.name));
                    });
                }
            });
        });

        $('#searchUser').keyup(function() {
            let query = $(this).val();
            $.ajax({
                url: `/search-users?searchTerm=${query}`,
                type: 'GET',
                success: function(data) {
                    let dropdown = $('#assignedTo');
                    dropdown.empty();
                    $.each(data.data, function(key, user) {
                        dropdown.append($('<option></option>').attr('value', user.id).text(user.name));
                    });
                }
            });
        });
    });
</script>


@endsection