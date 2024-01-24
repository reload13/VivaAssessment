<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viva</title>

</head>
<body>
<header>
    <h1>Products</h1>
</header>

<main>
    <form action="orders/create" method="post">
        <?php


//        var_export($products);
        foreach ($products->products as $product) {
            echo '<div>';
            echo '<label for="' . $product->name . '">' . $product->name . '</label>';
            echo '<br/>';
            echo '<label for="' . $product->price . '">Price:' . $product->price . '€</label>';
            echo '<br/>';


            echo '<input type="hidden" name="products[' . $product->id . '][id]" value="'.$product->id.'">';
            echo '<input type="hidden" name="products[' . $product->id . '][price]" value="'.$product->price.'">';
            echo '<label for="quantity_' . $product->id . '">Qty:</label>';

            echo '<input type="number" name="products[' . $product->id . '][amount]" value="0" min="0">';

            echo '</div>';
            echo '<br/>';
            echo '<br/>';
        }
        echo '<label for="coupon">Coupon</label>';
        echo '<br/>';
        echo '<input type="text" id="coupon" name="coupon">';
        ?>

        <button type="submit">Submit</button>
    </form>
</main>

<footer>

</footer>


</body>
</html>
