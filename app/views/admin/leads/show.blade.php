@extends('admin.template')

@section('content')

    <h1>Lead from {{{ $lead->name }}}</h1>

    <div class="panel panel-default">
        <div class="panel-body">
            <dl class="dl-horizontal">

                <dt>Date:</dt>
                <dd>{{{ $lead->created_at->toDayDateTimeString() }}}</dd>

                <dt>Sent from:</dt>
                <dd><a href="{{{ $lead->url }}}">{{{ $lead->url }}}</a></dd>

                <dt>Name:</dt>
                <dd>{{{ $lead->name }}}</dd>

                @if ($lead->email)
                    <dt>Email:</dt>
                    <dd><a href="mailto:{{{ $lead->email }}}">{{{ $lead->email }}}</a></dd>
                @endif

                @if ($lead->phone)
                    <dt>Phone:</dt>
                    <dd>{{{ $lead->phone }}}</dd>
                @endif

                @if ($lead->address)
                    <dt>Address:</dt>
                    <dd>{{{ $lead->address }}}</dd>
                @endif

                @if ($lead->photo_filename)
                    <dt>Photo:</dt>
                    <dd>
                        <a href="/img/leads/filename_{{ $lead->photo_filename }}" target="_blank">
                            <img src="/img/leads/filename_{{ $lead->photo_filename }},crop_ratio_1_1,width_250" width="250" height="250">
                        </a>
                    </dd>
                @endif

                @if ($lead->message)
                    <dt>Message:</dt>
                    <dd>
                        <blockquote>
                            {{ nl2br(e($lead->message)) }}
                        </blockquote>
                    </dd>
                @endif

            </dl>
            <a href="/admin/leads" class="btn btn-default">Done</a>
        </div>
    </div>

@stop