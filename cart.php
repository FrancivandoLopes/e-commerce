<?php
session_start();
require 'products.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = 0;
    }
    $_SESSION['cart'][$id]++;
}

if (isset($_GET['action']) && $_GET['action'] == 'clear') {
    unset($_SESSION['cart']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Carrinho de Compras</h1>
    <a href="index.php">Continuar Comprando</a>
    <a href="cart.php?action=clear">Esvaziar Carrinho</a>
    <a href="checkout.php">Finalizar Compra</a>
    <?php if (!empty($_SESSION['cart'])): ?>
        <ul>
            <?php foreach ($_SESSION['cart'] as $id => $quantity): ?>
                <li><?php echo $products[$id]['name']; ?> x <?php echo $quantity; ?> (R$<?php echo number_format($products[$id]['price'] * $quantity, 2); ?>)</li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Seu carrinho está vazio.</p>
    <?php endif; ?>
</body>
</html>
