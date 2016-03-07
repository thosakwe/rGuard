<?php
$url = route('confirm', ['confirmation_code' => $user->confirmation_code]);
?>
<html>
<body>
<h1>Welcome to {{ ucwords(config('rguard.title', 'our site')) }}!</h1>
<br/>

<p>
    Hi, {{ $user->name }}. Thanks for choosing {{ config('rguard.title', 'our site') }}.
    To confirm your account, simply click the following link:
    <a href="{{ $url }}">{{ $url }}</a>.

    We hope to see you soon!
</p>
</body>
</html>