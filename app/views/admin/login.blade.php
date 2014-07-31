<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Sign in | Control Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
        <style type="text/css">
                body {
                    padding-top: 40px;
                    padding-bottom: 40px;
                    background-color: #eee;
                }

                .form-signin {
                    max-width: 330px;
                    padding: 15px;
                    margin: 0 auto;
                }
                .form-signin .form-signin-heading,
                .form-signin .checkbox {
                    margin-bottom: 10px;
                }
                .form-signin .checkbox {
                    font-weight: normal;
                }
                .form-signin .form-control {
                    position: relative;
                    font-size: 16px;
                    height: auto;
                    padding: 10px;
                    -webkit-box-sizing: border-box;
                         -moz-box-sizing: border-box;
                                    box-sizing: border-box;
                }
                .form-signin .form-control:focus {
                    z-index: 2;
                }
                .form-signin input[type="text"] {
                    margin-bottom: -1px;
                    border-bottom-left-radius: 0;
                    border-bottom-right-radius: 0;
                }
                .form-signin input[type="password"] {
                    margin-bottom: 10px;
                    border-top-left-radius: 0;
                    border-top-right-radius: 0;
                }
        </style>
</head>
<body>

<div class="container">

        {{ Form::open(['url' => '/admin/login', 'method' => 'post', 'class' => 'form-signin']) }}

                <h2 class="form-signin-heading">Please sign in</h2>

                {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email address', 'autofocus' => 'autofocus']) }}
                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}

                @if (Session::get('login_failed'))
                        <div class="alert alert-danger">Invalid login information.</div>
                @endif

                {{ Form::submit('Sign in', ['class' => 'btn btn-lg btn-primary btn-block']) }}

        {{ Form::close() }}

</div>

</body>
</html>
