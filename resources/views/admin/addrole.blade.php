@extends('layouts.app')

@section('content')
<div class="container">

@if(Session('RoleSuccess'))
<div class="alert alert-success">
  <label>{{Session('RoleSuccess')}}</label>
</div>
@endif
@if(Session('RoleUnsuccess'))
<div class="alert alert-danger">
  <label>{{Session('RoleUnsuccess')}}</label>
</div>
@endif

        <form action="{{ route('role.create') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Role Name:</label>
                <input type="text" class="form-control" id="role" name="role" required>
            </div>
            <!-- Add other user fields as needed -->

            
            <button type="submit" class="btn btn-primary">Create</button>
        </form>

        <h2>Existing Roles</h2>
        <ul id="existingRoles">
            <!-- Existing roles will be displayed here using AJAX -->
        </ul>
    </div>

@endsection
