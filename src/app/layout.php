
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Flower Studio - Florărie online</title>

    <style>

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background-color: #F8F3ED;
            color: #435640;
            font-family: Georgia, serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* HEADER */

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

        nav a:hover {
            color: #EBCED3;
        }

        main {
            flex: 1;
        }

        /* HERO */

        .hero {
            background: linear-gradient(
                135deg,
                #F4E4E6,
                #EBCED3
            );
            text-align: center;
            padding: 85px 25px;
        }

        .hero-label {
            font-family: Arial, sans-serif;
            font-size: 12px;
            letter-spacing: 5px;
        }

        .hero h2 {
            font-size: 52px;
            font-weight: normal;
            margin: 25px 0;
        }

        .hero p {
            font-size: 18px;
            max-width: 650px;
            margin: 0 auto 30px;
            line-height: 1.7;
        }

        .btn {
            display: inline-block;
            background-color: #435640;
            color: white;
            padding: 15px 30px;
            border-radius: 6px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: #60765C;
        }

        /* CATALOG */

        .catalog {
            max-width: 1250px;
            margin: auto;
            padding: 60px 25px 80px;
        }

        .catalog h2 {
            text-align: center;
            font-size: 38px;
            font-weight: normal;
            margin: 0 0 15px;
        }

        .subtitle {
            text-align: center;
            color: #777;
            font-size: 17px;
            margin-bottom: 40px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        /* BUTOANE DE FILTRARE */

        .filters {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 35px;
        }

        .filter-btn {
            background-color: transparent;
            color: #435640;
            border: 1px solid #435640;
            border-radius: 25px;
            padding: 12px 22px;
            font-family: Georgia, serif;
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s;
        }

        .filter-btn:hover {
            background-color: #E0E9DC;
        }

        .filter-btn.active {
            background-color: #435640;
            color: white;
        }

        /* CARDURI PRODUSE */

        .product-card {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: 0.3s;
        }

        .product-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        /* IMAGINI */

        .product-image {
            position: relative;
            background-color: #F5F0EA;
            overflow: hidden;
        }

        .product-card img {
            width: 100%;
            height: 400px;
            object-fit: contain;
            object-position: center;
            display: block;
        }

        .recommended {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: #EBCED3;
            color: #435640;
            padding: 8px 13px;
            border-radius: 20px;
            font-size: 12px;
            font-family: Arial, sans-serif;
        }

        /* INFORMATII PRODUSE */

        .product-info {
            padding: 25px;
        }

        .product-info h3 {
            font-size: 26px;
            font-weight: normal;
            margin: 0 0 12px;
        }

        .description {
            color: #777;
            font-size: 15px;
            line-height: 1.6;
        }

        .occasion {
            color: #777;
            font-size: 13px;
            font-style: italic;
        }

        .price {
            font-size: 25px;
            font-weight: bold;
            color: #435640;
            margin: 20px 0;
        }

        .stock {
            display: inline-block;
            background-color: #E0E9DC;
            color: #435640;
            padding: 7px 15px;
            border-radius: 20px;
            font-size: 13px;
        }

        .out-of-stock {
            color: #A94442;
            font-size: 13px;
        }

        /* FOOTER */

        .footer {
            background-color: #435640;
            color: white;
            text-align: center;
            padding: 25px;
        }

        .footer p {
            margin: 0;
            font-size: 14px;
        }

        /* TABLETA */

        @media (max-width: 900px) {

            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .hero h2 {
                font-size: 40px;
            }
        }

        /* TELEFON */

        @media (max-width: 600px) {

            .product-grid {
                grid-template-columns: 1fr;
            }

            .hero h2 {
                font-size: 32px;
            }

            .hero {
                padding: 50px 20px;
            }

            .header {
                padding: 15px 20px;
            }

            .header h1 {
                font-size: 22px;
            }

            .product-card img {
                height: 350px;
            }

            .catalog h2 {
                font-size: 30px;
            }

            .filter-btn {
                font-size: 13px;
                padding: 10px 15px;
            }
        }

    </style>
</head>

<body>

    <?php require __DIR__ . '/../components/header.php'; ?>

    <?= $content ?>

    <?php require __DIR__ . '/../components/footer.php'; ?>

</body>
</html>
