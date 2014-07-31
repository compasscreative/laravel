<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Control Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
    <script src="/vendor/fine_uploader/custom.fineuploader-5.0.3.min.js"></script>
    <script src="/vendor/jquery.tablednd/jquery.tablednd.js"></script>
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Control Panel</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown {{ strpos(Request::path(), 'admin/users') === 0 ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/admin/users">List users</a></li>
                        <li><a href="/admin/users/create">Add user</a></li>
                        <li class="divider"></li>
                        <li><a href="/admin/users/sort-team">Sort team members</a></li>
                    </ul>
                </li>
                <li class="{{ strpos(Request::path(), 'admin/leads') === 0 ? 'active' : '' }}">
                    <a href="/admin/leads">Leads</a>
                </li>
                <li>
                    <a href="/admin/logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 75px; margin-bottom: 75px;">

    @if (Session::get('success'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::get('info'))
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('info') }}
        </div>
    @endif

    @if (Session::get('warning'))
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('warning') }}
        </div>
    @endif

    @if (Session::get('danger'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('danger') }}
        </div>
    @endif

    @yield('content')

</div>

</body>
</html>