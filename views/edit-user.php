<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Edit User</h1>
    <form action="index.php?page=user&action=edit&id=<?= $user['id']; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= $user['name']; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $user['email']; ?>" required>
        <br>
        <input type="submit" value="Update User">
    </form>
</body>
</html>
