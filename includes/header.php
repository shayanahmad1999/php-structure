<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= title($pageTitle) ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header>
        <nav>
            <a href="<?= url('index'); ?>">Home</a>
            <a href="<?= url('user'); ?>">Users</a>
            <a href="<?= url('product'); ?>">Products</a>
            <a href="<?= url('about'); ?>">About</a>
            <a href="<?= url('contact'); ?>">Contact</a>
        </nav>
    </header>
    <main>