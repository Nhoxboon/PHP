<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="POST">
    <label for="name">Quantity:</label>
    <input type="text" name="quantity">
    <input type="submit" value="Total">
</form>
</body>
</html>

<?php
$item = "pizza";
$price = 10.99;
$quantity = $_POST["quantity"];
$total = null;

$total = $quantity * $price;
echo "You have order {$quantity} x {$item}s and total is \${$total}";
?>