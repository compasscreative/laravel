@extends('partials.template')

@section('content')

<h1>About</h1>

@if ($team_members)
    <ul>
        @foreach ($team_members as $team_member)
            <li>
                @if ($team_member->photo_filename)
                    <img src="/img/team-members/filename_{{ $team_member->photo_filename }},crop_ratio_200_225,width_200" alt="{{{ $team_member->full_name }}}" width="200" height="250">
                @endif
                <h2>{{{ $team_member->full_name }}}</h2>
                <p>{{{ $team_member->title }}}</p>
                <p>{{{ $team_member->bio }}}</p>
            </li>
        @endforeach
    </ul>
@endif

@stop