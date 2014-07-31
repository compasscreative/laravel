@extends('admin.template')

@section('content')

    <h1>Users</h1>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover users">
                    <thead>
                        <tr>
                            <th width="1%"></th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Display In Team</th>
                            <th>Admin</th>
                            <th width="1%">
                                <a href="/admin/users/create" class="btn btn-success btn-sm">Add new</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    @if ($user->photo_filename)
                                        <img src="/img/team-members/filename_{{ $user->photo_filename }},crop_ratio_1_1,width_22,height_22" width="22" height="22">
                                    @endif
                                </td>
                                <td>
                                    {{{ $user->full_name }}}
                                </td>
                                <td>{{{ $user->phone }}}</td>
                                <td>{{{ $user->email }}}</td>
                                <td>
                                    @if ($user->display_on_team)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                <td>
                                    @if ($user->is_admin)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                <td nowrap="nowrap" align="right">
                                    <a href="/admin/users/{{{ $user->id }}}/edit" class="btn btn-primary btn-xs">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop