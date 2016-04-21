<!DOCTYPE html>
<html>
<body>
<h1>License Expiring Soon</h1>
<br/>

<div>
    Hi, this e-mail was sent to notify you that a purchase on {{config('rguard.title')}} is expiring within 7 days.

    <table>
        <tr>
            <td>Application</td>
            <td>{{$license->app->name}}</td>
        </tr>
        <tr>
            <td>Expires</td>
            <td>{{$license->created_at->addDays($license->app->days_to_expire)}}</td>
        </tr>
    </table>
</div>
</body>
</html>