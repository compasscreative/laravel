@extends('admin.template')

@section('content')

    <h1>Sort Team Members</h1>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="users">
                    <thead>
                        <tr>
                            <th width="1%"></th>
                            <th width="25%">Name</th>
                            <th width="25%">Title</th>
                            <th width="25%">Phone</th>
                            <th width="25%">Email</th>
                            <th width="1%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users))
                            @foreach ($users as $user)
                                <tr id="{{{ $user->id }}}">
                                    <td>
                                        @if ($user->photo_filename)
                                            <img src="/img/team-members/filename_{{ $user->photo_filename }},crop_ratio_1_1,width_22,height_22" width="22" height="22">
                                        @endif
                                    </td>
                                    <td>{{{ $user->full_name }}}</td>
                                    <td>{{{ $user->title }}}</td>
                                    <td>{{{ $user->phone }}}</td>
                                    <td>{{{ $user->email }}}</td>
                                    <td nowrap="nowrap" align="right">
                                        <button type="button" class="btn btn-primary btn-xs drag">
                                            <span class="glyphicon glyphicon-move "></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No team memebrs found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#users').tableDnD({
                dragHandle: '.drag',
                onDragClass: 'warning',
                onDrop: function(table, row) {
                    $.post('/admin/users/store-team-members-order', $.tableDnD.serialize());
                }
            });
        });
    </script>

@stop