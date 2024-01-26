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

<form id="editUserForm">
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone">
        <button type="button" onclick="findUser()">Find User</button>

        <div id="userDetails" style="display: none;">
            <!-- Display user details here -->
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">

            <button type="button" onclick="updateUser()">Update User</button>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function findUser() {
            var phoneNumber = $('#phone').val();

            $.ajax({
                url: '/find-user',
                method: 'POST',
                data: { phone: phoneNumber },
                success: function(response) {
                    var user = response.user;

                    if (user) {
                        $('#name').val(user.name);
                        $('#userDetails').show();
                    } else {
                        alert('User not found');
                    }
                },
                error: function() {
                    alert('Error finding user');
                }
            });
        }

        function updateUser() {
            var name = $('#name').val();

            $.ajax({
                url: '/update-user',
                method: 'POST',
                data: { name: name },
                success: function(response) {
                    alert(response.message);
                },
                error: function() {
                    alert('Error updating user');
                }
            });
        }
    </script>

@endsection
