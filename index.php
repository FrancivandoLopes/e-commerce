<?php
session_start();
require 'products.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loja Online</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Loja Online</h1>
    <div class="products">
        <?php foreach ($products as $id => $product): ?>
            <div class="product">
                <h2><?php echo $product['name']; ?></h2>
                <p><?php echo $product['description']; ?></p>
                <p>Preço: R$<?php echo number_format($product['price'], 2); ?></p>
                <form method="post" action="cart.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" value="Adicionar ao Carrinho">
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
