<p>Dear {{$user->name}},</p>

<p>Your account on the UmaHub Student Portal is ready and waiting for you to complete the registration.</p>

<p>Head over at <a href="{{config('app.url')}}/register">{{config('app.url')}}/register</a> and register with this email ({{$user->email}}).</p>
<p>If you run into any problems for some reason, don't hesitate to contact us at team@umahub.co.</p>

<p>Cheers!<br>
The UmaHub team</p>