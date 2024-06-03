<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to EISC</title>
</head>

<body>
    <h1>Welcome to EISC</h1>

    <p>Dear {{$user->name}},</p>

    <p>Thank you for your working with EISC. We are excited to have you on board!</p>
    <p>Your are successfully registered in EISC platform. You can
        access your dashboard
        with the link provided. <br>
        <span style="color:red">Don't forget to change the password once you logged in.</span>
        <br>
        Thanks.
    </p>

    <p>
        https://portal.eisc.com <br>
        Your password is: <strong>{{$newPassword}}</strong> don't share it for any one
    </p>

    <p>Best regards,</p>
    <p>EISC</p>
</body>

</html>