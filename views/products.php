<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Management</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Product Management</h1>
    <a href="index.php?page=product&action=create">Add Product</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product['id']; ?></td>
                <td><?= $product['name']; ?></td>
                <td><?= $product['price']; ?></td>
                <td>
                    <a href="index.php?page=product&action=edit&id=<?= $product['id']; ?>">Edit</a>
                    <a href="index.php?page=product&action=delete&id=<?= $product['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
