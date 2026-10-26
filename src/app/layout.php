<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($titlu, ENT_QUOTES, 'UTF-8') ?></title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff8fa;
            color: #333;
        }

        .header {
            padding: 24px;
            background: #7d3154;
            color: white;
            text-align: center;
        }

        .header h1 {
            margin: 0 0 10px;
        }

        .header p {
            margin: 0;
        }

        main {
            max-width: 1000px;
            margin: 30px auto;
            padding: 24px;
        }

        h2 {
            color: #7d3154;
        }

        p {
            line-height: 1.6;
        }

        footer {
            padding: 20px;
            text-align: center;
            border-top: 1px solid #e4cad5;
        }
    </style>
</head>
<body>

    <?php require __DIR__ . '/../components/Header.php'; ?>

    <main>
        <?php require $pagina; ?>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> Florărie </p>
    </footer>

</body>
</html>