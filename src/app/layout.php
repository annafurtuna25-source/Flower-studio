<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Studio - Florărie online</title>

    <style>
        body {
            margin: 0;
            background-color: #F8F3ED;
            color: #435640;
            font-family: Georgia, serif;
        }

        .header {
            background-color: #435640;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: normal;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 17px;
        }

        main {
            text-align: center;
            padding: 100px 20px;
        }

        main h2 {
            font-size: 50px;
            font-weight: normal;
        }

        main p {
            font-size: 20px;
            font-style: italic;
        }
    </style>
</head>

<body>

    <?php require __DIR__ . '/../components/header.php'; ?>

    <?php echo $content; ?>

</body>
</html>