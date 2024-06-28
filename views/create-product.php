<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Product</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Create Product</h1>
    <form action="index.php?page=product&action=create" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required>
        <br>
        <input type="submit" value="Create Product">
    </form>
</body>
</html>
