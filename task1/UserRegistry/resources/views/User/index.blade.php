@extends('app')
@section('title', 'User Listings | ePETstore')

@section('head')
    @parent
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">s
@endsection

@section('main')
    <main role="main">
        <!-- Jumbotron -->
        <div class="bg-image d-flex justify-content-center align-items-center"
                style="background-image: url('https://mdbcdn.b-cdn.net/img/new/fluid/nature/015.webp');
                height: 50vh; margin-top: -56px;">
            <h1 class="text-white">User Listings</h1>
        </div>
        <!-- Jumbotron -->

        <div class="container">
            <div class="row">
                <div class="col-md-9 offset-md-2">
                    <div class="float-right" style="padding-bottom: 10px; padding-top: 20px">
                        <a class="btn btn-secondary default-btn" data-toggle="modal" data-target="#addUserModal" href="#" role="button">Add New User</a>
                    </div>

                    <table class="table table-striped">
                        @if(count($users) > 0)
                            @foreach($users as $user)
                                <tr>
                                    <td> {{ $user->name }}</td>
                                    <td> {{ $user->email }} </td>
                                    <td>
                                        <a href="#" onclick="confirmDelete({{ $user->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td> There are no Uers at this point in time </td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div> <!-- /container -->
    </main>
@endsection

@include('User.create')
@include('User.delete')

<style>
    body {
        padding-top: 3.5rem;
    }

    .btn-secondary:not(:disabled):not(.disabled).active, .btn-secondary:not(:disabled):not(.disabled):active, .show>.btn-secondary.dropdown-toggle {
        color: #fff;
        background-color: #090909;
    }

    .default-btn {
        color: #fff;
        background-color: #090909 !important;
        border-color: #6c757d;
    }

    .center {
        position: absolute;
        top: 175px;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 10px;
    }

</style>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
</script>
<script>
    $(document).ready(function () {
        $('#add-user-form').submit(function (e) {
            e.preventDefault();
            resetFields();
            spinner(0);
            let errors = false;
            var token = $('#token').val();

            let name = $('#name').val();
            if (name.length === 0) {
                $('#error-name').append("Please Enter you name").show();
                errors = true;
            } else {
                $("#error-name").html("");
            }

            let surname = $('#surname').val();
            if (surname.length === 0) {
                $('#error-surname').append("Please enter you surname").show();
                errors = true;
            } else {
                $("#error-surname").html("");
            }

            let email = $('#email').val();
            if (email.length === 0) {
                $('#error-email').append("Please enter you email").show();
                errors = true;
            } else if (!IsEmail(email)) {
                errors = true;
                $('#error-email').append("Please enter a valid email address").show();
            } else {
                $("#error-email").html("");
            }

            let position = $('#position').val();
            if (position.length === 0) {
                $('#error-position').append("Please enter you position").show();
                errors = true;
            } else {
                $("#error-position").html("");
            }

            if (!errors) {
                let dataset = {"name": name, "surname": surname, "email": email, "position": position, '_token' : token};

                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                });

                $.ajax({
                    url: '/api/user/create',
                    type: 'POST',
                    data: dataset,
                    dataType: 'json',
                    encode: true,
                    method: 'POST',
                    success:function(response)
                    {
                        alert(response.message);
                        spinner(1);
                        $('#addUserModal').modal('hide');
                        location.reload();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText)

                        if (xhr.responseText.message) {
                            alert('duplicate')
                        }
                    }
                });
            } else {
                setTimeout(() => {
                    spinner(1);
                }, 5000);
            }
        });

        $("#delete-user-form").submit(function(e) {
            e.preventDefault();
            spinner(0);
            let selected_id = $('#delete_id').val();

            const formData = $(this);

            $.ajax({
                url: '/api/users/destroy/' + selected_id,
                method: 'POST',
                data: formData.serialize(),
                success:function(response)
                {
                    alert(response.message);
                    spinner(1);
                    $('#deleteUserModal').modal('hide');
                    location.reload();
                },
                error: function(response) {}
            });
        });
    });

    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        return regex.test(email);
    }

    function resetFields() {
        $("#error-position").html("");
        $("#error-name").html("");
        $("#error-surname").html("");
        $("#error-email").html("");
    }

    function spinner(errors) {
        if (errors === 0) {
            document.getElementsByClassName("loader")[0].style.display = "block";
        } else {
            document.getElementsByClassName("loader")[0].style.display = "none";
        }
    }

    function confirmDelete(id) {
        $('input[name="delete_id"]').val(id);
        $('#deleteUserModal').modal('show');
    }
</script>
