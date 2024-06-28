<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Edit Product</h1>
    <form action="index.php?page=product&action=edit&id=<?= $product['id']; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= $product['name']; ?>" required>
        <br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="<?= $product['price']; ?>" required>
        <br>
        <input type="submit" value="Update Product">
    </form>
</body>
</html>
