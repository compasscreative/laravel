<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
            {{ Form::label('first_name', 'First name:', ['class' => 'control-label']) }}
            {{ Form::text('first_name', null, ['class' => 'form-control']) }}
            {{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
            {{ Form::label('last_name', 'Last name:', ['class' => 'control-label']) }}
            {{ Form::text('last_name', null, ['class' => 'form-control']) }}
            {{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            {{ Form::label('title', 'Title:', ['class' => 'control-label']) }}
            {{ Form::text('title', null, ['class' => 'form-control']) }}
            {{ $errors->first('title', '<span class="help-block">:message</span>') }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('display_on_team') ? 'has-error' : '' }}">
            {{ Form::label('display_on_team', 'Display on team:', ['class' => 'control-label']) }}
            {{ Form::select('display_on_team', ['0' => 'No', '1' => 'Yes'], isset($user) ? $user->display_on_team : null, ['class' => 'form-control']) }}
            {{ $errors->first('display_on_team', '<span class="help-block">:message</span>') }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
            {{ Form::label('phone', 'Phone:', ['class' => 'control-label']) }}
            {{ Form::text('phone', null, ['class' => 'form-control']) }}
            {{ $errors->first('phone', '<span class="help-block">:message</span>') }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('is_admin') ? 'has-error' : '' }}">
            {{ Form::label('is_admin', 'Administrative privileges:', ['class' => 'control-label']) }}
            {{ Form::select('is_admin', ['0' => 'No', '1' => 'Yes'], isset($user) ? $user->is_admin : null, ['class' => 'form-control']) }}
            {{ $errors->first('is_admin', '<span class="help-block">:message</span>') }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            {{ Form::label('email', 'Email:', ['class' => 'control-label']) }}
            {{ Form::email('email', null, ['class' => 'form-control']) }}
            {{ $errors->first('email', '<span class="help-block">:message</span>') }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            {{ Form::label('password', 'Password:', ['class' => 'control-label']) }}
            <div class="input-group">
                <span class="input-group-addon">
                    {{ Form::checkbox('password-toggle') }}
                </span>
                {{ Form::password('password', ['class' => 'form-control', 'disabled' => 'true']) }}
            </div>
            {{ $errors->first('password', '<span class="help-block">:message</span>') }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('bio') ? 'has-error' : '' }}">
            {{ Form::label('bio', 'Bio:', ['class' => 'control-label']) }}
            {{ Form::textarea('bio', null, ['class' => 'form-control', 'rows' => 9]) }}
            {{ $errors->first('bio', '<span class="help-block">:message</span>') }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
            {{ Form::label('photo', 'Photo:', ['class' => 'control-label']) }}
            <div class="input-group">
                <span class="input-group-addon">
                    @if (isset($user) and $user->photo_filename)
                        <img src="/img/team-members/filename_{{ $user->photo_filename }},crop_ratio_1_1,width_100" width="100" height="100">
                    @else
                        <span class="glyphicon glyphicon-picture"></span>
                    @endif
                </span>
                <div class="form-control">
                    {{ Form::file('photo', null, ['class' => 'form-control']) }}
                </div>
            </div>
            {{ $errors->first('photo', '<span class="help-block">:message</span>') }}
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('input[name="password-toggle"]').click(function() {
            if ($(this).is(':checked')) {
                $('input[type="password"]').attr('disabled', false);
            } else {
                $('input[type="password"]').attr('disabled', true).val('');
            }
        });
    });
</script>