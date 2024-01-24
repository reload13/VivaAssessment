 <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


    </head>
    <body>
    <header>
        <h1> User edit</h1>
    </header>

    <main>

            <?php
            var_dump($_SESSION["errors"]);
            echo '<form id="deleteForm" action="/users/'.$user['id'].'/update" method="post">';

            echo '<div>';
            echo '<label for="email">E-mail</label>';
            echo '<input id="email" type="text" name="email" value="'.$user['email'].'">';
            echo '<input id="email" type="hidden" name="id" value="'.$user['id'].'">';
            echo '<br/>';
            echo '<br/>';

            echo '<br/>';
            echo '<br/>';
            echo '<label for="firstname">Name:</label>';
            echo '<input id="firstname" type="text" name="firstname" value="'.$user['firstname'].'">';
            echo '<br/>';
            echo '<br/>';
            echo '<label for="lastname">SurName:</label>';
            echo '<input id="lastname" type="text" name="lastname" value="'.$user['lastname'].'">';
            echo '<br/>';

            echo '<br/>';
            echo '<br/>';
            echo '<br/>';
            echo '<label for="coupon">Coupon</label>';
            echo '<input type="text" id="coupon" name="coupon" value="'.$user['coupon'].'">';
            unset($_SESSION["errors"]);
            ?>

            <button type="submit">Submit</button>
        </form>
    </main>

    <footer>

    </footer>

    </body>
    </html>


