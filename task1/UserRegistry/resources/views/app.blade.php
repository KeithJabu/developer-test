<!doctype html>
<html class="no-js" lang="en">
    <head>
        @section('head')
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">

            <!-- Bootstrap core CSS -->
            <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

            <!-- Custom styles for this template -->

            <title>@yield('title')</title>
        @show
    </head>

    <body>
        <div id="app" class="max-w-screen-xl mx-auto font-body">
            @yield('main')
        </div>
    </body>

   <?php // @include('includes.scripts') ?>


    <style>
        @media screen and (max-width: 768px) {
            .zsiq_floatmain {
                bottom: 65px;
            }
        }

        body {
            padding-top: 3.5rem;
        }

        a {
            color: #ac0229;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgb(235 235 235);
        }


    </style>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
</html>
