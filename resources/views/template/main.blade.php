<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .navbar-toggler {
            border: none;
            outline: none;

            &:focus,
            &:active,
            &-icon:focus {
                outline: none;
                box-shadow: none;
            }
        }

        .navbar-toggler:focus,
        .navbar-toggler-icon:focus {
            outline: none;
            box-shadow: none;
        }

        .form-control {
            outline: none;
            box-shadow: none;
            border: 2px solid lightgrey;

            &:focus,
            &:active {
                outline: none;
                box-shadow: none;
                border-color: grey;
            }
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input {
            margin-bottom: -1px;
            border-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <main class="container">
        @yield('container')
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>
</html>