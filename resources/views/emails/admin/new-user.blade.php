<p>Dear {{ $name }},</p>
<p>We are delighted to inform you that your new account has been successfully created. Please find below your login credentials:</p>
<ul>
    <li><b>Name:</b> {{ $name }}</li>
    <li><b>Email:</b> {{ $email }}</li>
    <li><b>Password:</b> {{ $password }}</li>
</ul>
<p>For security reasons, we strongly advise you to change your password upon logging in.</p>
<p>You can access your account by clicking on the following link:</p>
<a href="{{ $loginUrl }}">Login</a>
<p>For resetting your password, please click on the following link:</p>
<a href="{{ $resetPasswordUrl }}">Reset Password</a>
<p>If you encounter any issues or have questions, please don't hesitate to contact us at {{ $supportEmail }}.</p>
<br/>
<p>Thanks,</p>
<p>{{ config('app.name') }} Team</p>
