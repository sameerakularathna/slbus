@extends('layouts.app')

@section('content')
<div class="container">

@if(Session('PerSuccess'))
<div class="alert alert-success">
  <label>{{Session('PerSuccess')}}</label>
</div>
@endif
@if(Session('PerUnsuccess'))
<div class="alert alert-danger">
  <label>{{Session('PerUnsuccess')}}</label>
</div>
@endif

        <form action="{{ route('per.create') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Permission:</label>
                <input type="text" class="form-control" id="per" name="per" required>
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
