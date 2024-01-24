<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viva | Products</title>
</head>
<body>
<header>
    <h1>Orders</h1>
</header>

<main>

    <?php

    echo '<table>';
    echo '<tr>';
    echo '<th>';
    echo 'OrderId';
    echo '</th>';
    echo '<th>';
    echo 'StateId';
    echo '</th>';
    echo '<th>';
    echo 'E-mail';
    echo '</th>';
    echo '<th>';
    echo 'Name';
    echo '</th>';
    echo '<th>';
    echo 'Price';
    echo '</th>';
    echo '<th>';
    echo '</th>';
    echo '</tr>';
    foreach ($orders as $order) {

        echo '<tr>';
        echo '<td>';
        echo $order['OrderCode'];
        echo '</td>';
        echo '<td>';
        echo $order['StateId'];
        echo '</td>';
        echo '<td>';
        echo $order['CustomerEmail'];
        echo '</td>';
        echo '<td>';
        echo $order['CustomerFullname'];
        echo '</td>';
        echo "<td>";
        echo $order['Amount']."€";
        echo "</td>";
        echo '<td>';
        echo '<form id="deleteForm" action="/admin/orders/'.$order['id'].'/show" method="get">
                      <button type="submit">Show</button>
                  </form>';
        echo '</td>';
        echo '</tr>';

    }
    echo '</table>';
    echo '<br/>';
    echo '<br/>';
    ?>


</main>

<footer></footer>

</body>
</html>
