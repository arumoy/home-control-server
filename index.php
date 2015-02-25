<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login :: Home Control</title>
    <link rel="stylesheet" href="styl/sty.css">
</head>
<body>
<header>
    Login :: Home Control
</header>
<div id="login_auth">
    <form method="post" id="login" action="/dashboard/">
        <fieldset>
            <legend>Log In</legend>
            UserName: <input id="username" name="username" type="text"><br>
            Pass: <input id="pass" name="pass" type="password"><br>
            <input type="submit" value="Log In">
        </fieldset>
    </form>
</div>
</body>
</html>