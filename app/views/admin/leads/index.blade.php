@extends('admin.template')

@section('content')

    <h1>Leads</h1>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th width="1%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($leads->count())
                            @foreach ($leads as $lead)
                                <tr>
                                    <td>{{{ $lead->created_at->toDayDateTimeString() }}}</td>
                                    <td>{{{ $lead->name }}}</td>
                                    <td>{{{ $lead->email }}}</td>
                                    <td>{{{ $lead->phone }}}</td>
                                    <td nowrap="nowrap" align="right">
                                        <a href="/admin/leads/{{{ $lead->id }}}" class="btn btn-primary btn-xs">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">No leads found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop