<!DOCTYPE html>
<html>
<body>
<h1>Purchase Success</h1>
<br/>

<div>
    Hi, this e-mail was sent to notify of a purchase of a license on {{config('rguard.title')}}.

    <table>
        <tr>
            <td>Application</td>
            <td>{{$license->app->name}}</td>
        </tr>
        <tr>
            <td>License Code (Try not to Forget This!)</td>
            <td>{{$license->code}}</td>
        </tr>
    </table>

    If something is wrong, please contact us to resolve the issue.
</div>
</body>
</html>