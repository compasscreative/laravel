@extends('partials.template', ['title' => $team_member->full_name])

@section('content')

<h1>{{{ $team_member->full_name }}}</h1>

@if ($team_member->photo_filename)
    <img src="/img/team-members/filename_{{ $team_member->photo_filename }},crop_ratio_400_500,width_400" alt="{{{ $team_member->full_name }}}" width="400" height="500">
@endif

@if ($team_member->title)
    <h2>{{{ $team_member->title }}}</h2>
@endif

@if ($team_member->email)
    <h2>Email:</h2>
    <a href="mailto:{{{ $team_member->email }}}">{{{ $team_member->email }}}</a>
@endif

@if ($team_member->phone)
    <h2>Phone:</h2>
    {{{ $team_member->phone }}}
@endif

@if ($team_member->bio)
    <div>
        {{ $team_member->bio_as_html }}
    </div>
@endif

@stop