@extends('app')
@section('title', 'User Listings | ePETstore')
@section('head')
    @parent
    <link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('main')
    <main role="main">
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <!-- Jumbotron -->
        <div class="bg-image d-flex justify-content-center align-items-center"
                style="background-image: url('https://mdbcdn.b-cdn.net/img/new/fluid/nature/015.webp');
                height: 50vh; margin-top: -56px;">
            <h1 class="text-white">User Listings</h1>
        </div>
        <!-- Jumbotron -->

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-9 offset-md-2">
                    <div class="float-right" style="padding-bottom: 10px; padding-top: 20px">
                        <a class="btn btn-secondary add_new_user" href="#" role="button">Add New User</a>
                    </div>
                    <table class="table table-striped">
                        @if(count($users) > 0)
                            @foreach($users as $user)
                                <tr>
                                    <td> {{ $user->name }}</td>
                                    <td> {{ $user->email }} </td>
                                    <td>
                                            <a
                                                href="#" onclick="
                                                    var result = confirm('Are you sure you wish to delete this Product?')
                                                        if (result) {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form').submit()
                                                        }
                                                ">
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
                                <td> There are no users at this point in time </td>
                            </tr>
                        @endif

                </div>
            </div>


        </div> <!-- /container -->

    </main>
@endsection

<style>
    body {
        padding-top: 3.5rem;
    }

    .btn-secondary:not(:disabled):not(.disabled).active, .btn-secondary:not(:disabled):not(.disabled):active, .show>.btn-secondary.dropdown-toggle {
        color: #fff;
        background-color: #090909;
    }

    .add_new_user {
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
