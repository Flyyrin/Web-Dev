<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <title>Login</title>
    </head> 
    <body>
    <h2>Login</h2>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="userId" placeholder="Username or Email...">
            <input type="password" name="userPassword" placeholder="Password...">
            <button type="submit" name="submit">Login</button>
        </form>
    </body>
</html>