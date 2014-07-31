@extends('admin.template')

@section('content')

    <h1>Edit user</h1>

    <div class="panel panel-default">
        <div class="panel-body">

            {{ Form::model($user, ['method' => 'PUT', 'url' => 'admin/users/' . $user->id, 'files' => true]) }}

                @include('admin.users.fields')

                <div class="form-group">
                    {{ Form::submit('Save Changes', ['class' => 'btn btn-primary']) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'name' => '_method', 'value' => 'DELETE', 'onclick' => 'javascript: return confirm("Delete this record?");']) }}
                    <a href="/admin/users" class="btn btn-default">Done</a>
                </div>

            {{ Form::close() }}

        </div>
    </div>

@stop