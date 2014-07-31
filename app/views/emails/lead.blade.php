<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<h1>Lead from {{{ $lead->name }}}</h1>

<p>
    <strong>Date:</strong><br>
    {{{ $lead->created_at->toDayDateTimeString() }}}
</p>
<p>
    <strong>Sent from:</strong><br>
    <a href="{{{ $lead->url }}}">{{{ $lead->url }}}</a>
</p>
<p>
    <strong>Name:</strong><br>
    {{{ $lead->name }}}
</p>
<p>
    <strong>Email:</strong><br>
    {{{ $lead->email }}}
</p>
<p>
    <strong>Phone:</strong><br>
    {{{ $lead->phone }}}
</p>
<p>
    <strong>City:</strong><br>
    {{{ $lead->city }}}
</p>
<p>
    <strong>Message:</strong><br>
    {{ nl2br(e($lead->message)) }}
</p>

</body>
</html>