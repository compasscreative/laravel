{{ Form::open(['url' => 'contact', 'method' => 'post', 'id' => 'form', 'class' => 'contact_form']) }}
    <ul>
        <li>
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, ['placeholder' => 'First &amp; last', 'required' => 'required']) }}
            {{ $errors->first('name', '<label for="name" class="error">:message</label>') }}
        </li>
        <li>
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, ['placeholder' => 'your@email.com', 'required' => 'required']) }}
            {{ $errors->first('email', '<label for="email" class="error">:message</label>') }}
        </li>
        <li>
            {{ Form::label('phone', 'Phone') }}
            {{ Form::text('phone', null, ['placeholder' => '555.555.5555']) }}
            {{ $errors->first('phone', '<label for="phone" class="error">:message</label>') }}
        </li>
        <li>
            {{ Form::label('address', 'Address') }}
            {{ Form::text('address', null, ['placeholder' => 'Street and city']) }}
            {{ $errors->first('address', '<label for="address" class="error">:message</label>') }}
        </li>
        <li>
            {{ Form::label('message', 'Questions & comments') }}
            {{ Form::textarea('message', null, ['placeholder' => 'How can we help you?']) }}
            {{ $errors->first('message', '<label for="message" class="error">:message</label>') }}
        </li>
        <li>
            {{ Form::submit('Send Message') }}
        </li>
    </ul>
{{ Form::close() }}