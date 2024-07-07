<?php
session_start();
require 'products.php';

$total = 0;
foreach ($_SESSION['cart'] as $id => $quantity) {
    $total += $products[$id]['price'] * $quantity;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    unset($_SESSION['cart']);
    $message = "Pagamento de R$" . number_format($total, 2) . " realizado com sucesso!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Checkout</h1>
    <?php if (isset($message)): ?>
        <p><?php echo $message; ?></p>
        <a href="index.php">Voltar para a loja</a>
    <?php else: ?>
        <p>Total a pagar: R$<?php echo number_format($total, 2); ?></p>
        <form method="post" action="checkout.php">
            <input type="submit" value="Pagar">
        </form>
    <?php endif; ?>
</body>
</html>
