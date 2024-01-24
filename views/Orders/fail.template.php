<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viva</title>

</head>
<body>
<header>
    <h1>Payment Fail</h1>
</header>

<main>
    <?php
//    var_export($data);
    ?>
    <?php echo $data["status_message"] ?>
    <br>

    <?php
        echo ('or retry to place the order by following this <a target="_blank" href="https://demo.vivapayments.com/web/checkout?ref='.$data['orderCode'].'">url</a>')
    ?>
</main>

<footer>

</footer>


</body>
</html>
