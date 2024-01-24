<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

</head>
<body>
<header>
    <h1>Login</h1>
</header>

<main>
    <form action="user_check" method="post">
        <?php

        echo '<div>';
        echo '<label for="email">E-mail</label>';
        echo '<input id="email" type="text" name="email">';
        echo '<br/>';
        echo '<label for="password">Password:</label>';
        echo '<input id="password" type="password" name="password">';
        echo '<br/>';

        ?>

        <button type="submit">Submit</button>
    </form>
</main>

<footer>

</footer>


</body>
</html>
