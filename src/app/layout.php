
<!DOCTYPE html>
<html lang="ro">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        <?= htmlspecialchars($pageTitle ?? 'Flower Studio') ?>
    </title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php require __DIR__ . '/../components/header.php'; ?>

    <?= $content ?? '' ?>

    <?php require __DIR__ . '/../components/footer.php'; ?>

    <script src="js/script.js"></script>

</body>

</html>
