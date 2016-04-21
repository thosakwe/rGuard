<!DOCTYPE html>
<html>
<body>
<h1>License Expired</h1>
<br/>

<div>
    Hi, this e-mail was sent to notify you that a purchase on {{config('rguard.title')}} expired today.

    <table>
        <tr>
            <td>Application</td>
            <td>{{$license->app->name}}</td>
        </tr>
    </table>

    Come back to our site to purchase another license!
</div>
</body>
</html>