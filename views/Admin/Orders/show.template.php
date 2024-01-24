<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viva</title>

</head>
<body>
<header>
    <h1>Order</h1>
</header>

<main>
    <table>
        <tr>
            <td style='text-align: left;'>Order Code</td>
            <td style='text-align: center;'>Transaction Id</td>
            <td style='text-align: center;'>Products</td>
            <td style='text-align: center;'>StateId</td>
            <td style='text-align: center;'>Discount</td>
            <td style='text-align: center;'>Amount</td>
            <td style='text-align: center;'>Email</td>
            <td style='text-align: center;'>Full name</td>
            <td style='text-align: center;'>Delete</td>
        </tr>
        <tr>
        <?php
        echo "<td style='text-align: center;'>";
        echo $order['OrderCode'];
        echo "</td>";
        echo "<td style='text-align: center;'>";
        echo $order['TransactionId'];
        echo "</td>";
        echo "<td style='text-align: center;'>";
        echo implode(",",$order['ordered_products']);
        echo "</td>";
        echo "<td>";
        echo $order['StateId'];
        echo "</td style='text-align: center;'>";
        echo "<td>";
        echo $order['Discount'];
        echo "</td>";
        echo "<td style='text-align: center;'>";
        echo $order['Amount'];
        echo "</td>";
        echo "<td style='text-align: center;'>";
        echo $order['CustomerEmail'];
        echo "</td>";
        echo "<td style='text-align: center;'>";
        echo $order['CustomerFullname'];
        echo "</td>";
        echo "<td style='text-align: center;'>";
        echo '<form id="deleteForm" action="/admin/orders/delete" method="post">
                      <input type="hidden" name="OrderCode" value="'.$order['OrderCode'].'">
                      <input type="hidden" name="id" value="'.$order['id'].'">
                      <button type="submit">Delete</button>
                  </form>';
        echo "</td>";

        ?>
        </tr>
    </table>
</main>

<footer>

</footer>


</body>
</html>
