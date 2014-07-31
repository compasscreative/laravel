@extends('admin.template')

@section('content')

    <h1>Add user</h1>

    <div class="panel panel-default">
        <div class="panel-body">

            {{ Form::open(['method' => 'POST', 'url' => 'admin/users', 'files' => true]) }}

                @include('admin.users.fields')

                {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                <a href="/admin/users" class="btn btn-default">Cancel</a>

            {{ Form::close() }}

        </div>
    </div>

@stop