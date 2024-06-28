
<h1>User Management</h1>
<a href="<?= url('create-user') ?>">Add User</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['name']; ?></td>
                <td><?= $user['email']; ?></td>
                <td>
                    <a href="index?page=user&action=edit&id=<?= $user['id']; ?>">Edit</a>
                    <a href="index?page=user&action=delete&id=<?= $user['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>