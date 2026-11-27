<?php

require __DIR__ . '/src/lib/produse_mock.php';

$clienti = [
    ['id' => 1, 'nume' => 'Maria Popescu', 'email' => 'maria@example.com', 'comenzi' => 2],
    ['id' => 2, 'nume' => 'Elena Rusu', 'email' => 'elena@example.com', 'comenzi' => 1],
    ['id' => 3, 'nume' => 'Ion Munteanu', 'email' => 'ion@example.com', 'comenzi' => 1]
];

$comenzi = [
    ['id' => 1, 'client' => 'Maria Popescu', 'produs' => 'Rose Elegance', 'total' => 650, 'status' => 'Nouă'],
    ['id' => 2, 'client' => 'Elena Rusu', 'produs' => 'Tulip Dream', 'total' => 450, 'status' => 'În pregătire'],
    ['id' => 3, 'client' => 'Ion Munteanu', 'produs' => 'Peony Love', 'total' => 850, 'status' => 'Livrată'],
    ['id' => 4, 'client' => 'Maria Popescu', 'produs' => 'Buchet personalizat', 'total' => 800, 'status' => 'Confirmată']
];

$totalComenzi = array_sum(array_column($comenzi, 'total'));

function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrare - Flower Studio</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #F8F3ED;
            color: #435640;
            font-family: Arial, sans-serif;
        }

        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: #435640;
            color: white;
            padding: 25px 15px;
            flex-shrink: 0;
        }

        .sidebar h2 {
            font-family: Georgia, serif;
            font-weight: normal;
            font-size: 27px;
        }

        .sidebar p {
            font-size: 11px;
            letter-spacing: 2px;
            margin-bottom: 35px;
        }

        .sidebar button,
        .sidebar a {
            display: block;
            width: 100%;
            padding: 16px;
            margin-bottom: 8px;
            border: none;
            background: transparent;
            color: white;
            text-align: left;
            text-decoration: none;
            cursor: pointer;
            border-radius: 6px;
            font-size: 14px;
        }

        .sidebar button:hover,
        .sidebar button.active {
            background: #687E62;
        }

        .admin-main {
            flex: 1;
            min-width: 0;
            padding: 35px;
        }

        h1, h2 {
            font-family: Georgia, serif;
            font-weight: normal;
        }

        h1 {
            font-size: 36px;
        }

        .admin-header {
            border-bottom: 1px solid #ddd;
            padding-bottom: 25px;
            margin-bottom: 30px;
        }

        .admin-section {
            display: none;
        }

        .admin-section.active {
            display: block;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            border-left: 4px solid #435640;
        }

        .stat-card span {
            font-size: 14px;
            color: #777;
        }

        .stat-card strong {
            display: block;
            font-size: 30px;
            font-family: Georgia, serif;
            margin-top: 20px;
        }

        .table-box {
            background: white;
            border-radius: 12px;
            padding: 25px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: #DCE6D7;
            text-align: left;
        }

        th, td {
            padding: 16px 12px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        .status {
            background: #DCE6D7;
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 12px;
            display: inline-block;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: #435640;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .edit-btn {
            background: #DCE6D7;
            color: #435640;
        }

        .delete-btn {
            background: #EBCED3;
            color: #843D49;
        }

        .search {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 280px;
            max-width: 100%;
            margin: 15px 0;
        }

        .pagination {
            margin-top: 20px;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        @media (max-width: 900px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .sidebar {
                width: 190px;
            }

            .admin-main {
                padding: 15px;
            }
        }

        @media (max-width: 600px) {
            .admin-layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="admin-layout">

    <aside class="sidebar">

        <h2>❀ Flower Studio</h2>
        <p>PANOU DE ADMINISTRARE</p>

        <button class="menu-btn active" data-section="dashboard">
            ▦ Dashboard
        </button>

        <button class="menu-btn" data-section="produse">
            ❀ Produse
        </button>

        <button class="menu-btn" data-section="comenzi">
            ▤ Comenzi
        </button>

        <button class="menu-btn" data-section="buchete">
            ♡ Buchete personalizate
        </button>

        <button class="menu-btn" data-section="clienti">
            ♙ Clienți
        </button>

        <button class="menu-btn" data-section="stocuri">
            ▣ Stocuri
        </button>

        <a href="index.php">← Înapoi la magazin</a>

    </aside>

    <main class="admin-main">

        <header class="admin-header">
            <h1>Panou de administrare</h1>
            <p>Gestionează activitatea florăriei Flower Studio.</p>
        </header>

        <!-- DASHBOARD -->

        <section id="dashboard" class="admin-section active">

            <h2>Prezentare generală</h2>

            <div class="stats-grid">

                <div class="stat-card">
                    <span>Total produse</span>
                    <strong><?= count($produse) ?></strong>
                </div>

                <div class="stat-card">
                    <span>Total comenzi</span>
                    <strong><?= count($comenzi) ?></strong>
                </div>

                <div class="stat-card">
                    <span>Total clienți</span>
                    <strong><?= count($clienti) ?></strong>
                </div>

                <div class="stat-card">
                    <span>Valoarea comenzilor</span>
                    <strong>
                        <?= number_format($totalComenzi, 0) ?> MDL
                    </strong>
                </div>

            </div>

            <div class="table-box">

                <h2>Comenzi recente</h2>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Produs</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach ($comenzi as $comanda): ?>

                        <tr>
                            <td>#<?= e($comanda['id']) ?></td>
                            <td><?= e($comanda['client']) ?></td>
                            <td><?= e($comanda['produs']) ?></td>
                            <td><?= e($comanda['total']) ?> MDL</td>
                            <td>
                                <span class="status">
                                    <?= e($comanda['status']) ?>
                                </span>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                    </tbody>
                </table>

            </div>

        </section>

        <!-- PRODUSE -->

        <section id="produse" class="admin-section">

            <div class="table-box">

                <h2>Gestionarea produselor</h2>

                <a href="admin_product.php" class="btn">
                    + Adaugă produs
                </a>

                <br>

                <input type="text"
                       class="search"
                       placeholder="Caută un produs...">

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Denumire</th>
                            <th>Preț</th>
                            <th>Stoc</th>
                            <th>Status</th>
                            <th>Acțiuni</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach ($produse as $produs): ?>

                        <tr>
                            <td><?= e($produs['id_produs']) ?></td>
                            <td><?= e($produs['denumire']) ?></td>
                            <td><?= e($produs['pret_lei']) ?> MDL</td>
                            <td><?= e($produs['stoc']) ?></td>

                            <td>
                                <span class="status">
                                    <?= $produs['stoc'] > 0 ? 'În stoc' : 'Indisponibil' ?>
                                </span>
                            </td>

                            <td>

                                <a class="btn edit-btn"
                                   href="admin_product.php?id=<?= (int)$produs['id_produs'] ?>">
                                    Editează
                                </a>

                                <button class="btn delete-btn"
                                        onclick="stergeRand(this)">
                                    Șterge
                                </button>

                            </td>
                        </tr>

                    <?php endforeach; ?>

                    </tbody>
                </table>

                <div class="pagination"></div>

            </div>

        </section>

        <!-- COMENZI -->

        <section id="comenzi" class="admin-section">

            <div class="table-box">

                <h2>Gestionarea comenzilor</h2>

                <input type="text"
                       class="search"
                       placeholder="Caută o comandă...">

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Produs</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach ($comenzi as $comanda): ?>

                        <tr>
                            <td>#<?= e($comanda['id']) ?></td>
                            <td><?= e($comanda['client']) ?></td>
                            <td><?= e($comanda['produs']) ?></td>
                            <td><?= e($comanda['total']) ?> MDL</td>

                            <td>
                                <select class="status">

                                    <?php foreach (['Nouă', 'Confirmată', 'În pregătire', 'Livrată'] as $status): ?>

                                        <option <?= $status === $comanda['status'] ? 'selected' : '' ?>>
                                            <?= e($status) ?>
                                        </option>

                                    <?php endforeach; ?>

                                </select>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                    </tbody>
                </table>

                <div class="pagination"></div>

            </div>

        </section>

        <!-- BUCHETE PERSONALIZATE -->

        <section id="buchete" class="admin-section">

            <div class="table-box">

                <h2>Buchete personalizate</h2>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Flori</th>
                            <th>Ambalaj</th>
                            <th>Panglică</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>#1</td>
                            <td>Maria Popescu</td>
                            <td>15 trandafiri roz</td>
                            <td>Hârtie crem</td>
                            <td>Roz pastel</td>
                            <td>800 MDL</td>
                            <td>
                                <span class="status">
                                    Confirmată
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </section>

        <!-- CLIENTI -->

        <section id="clienti" class="admin-section">

            <div class="table-box">

                <h2>Gestionarea clienților</h2>

                <input type="text"
                       class="search"
                       placeholder="Caută un client...">

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nume</th>
                            <th>Email</th>
                            <th>Comenzi</th>
                            <th>Status</th>
                            <th>Acțiuni</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach ($clienti as $client): ?>

                        <tr>
                            <td><?= e($client['id']) ?></td>
                            <td><?= e($client['nume']) ?></td>
                            <td><?= e($client['email']) ?></td>
                            <td><?= e($client['comenzi']) ?></td>
                            <td>
                                <span class="status">Activ</span>
                            </td>
                            <td>
                                <button class="btn delete-btn"
                                        onclick="stergeRand(this)">
                                    Șterge
                                </button>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                    </tbody>
                </table>

                <div class="pagination"></div>

            </div>

        </section>

        <!-- STOCURI -->

        <section id="stocuri" class="admin-section">

            <div class="table-box">

                <h2>Gestionarea stocurilor</h2>

                <table>
                    <thead>
                        <tr>
                            <th>Produs</th>
                            <th>Cantitate</th>
                            <th>Status</th>
                            <th>Acțiuni</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach ($produse as $produs): ?>

                        <tr>
                            <td><?= e($produs['denumire']) ?></td>
                            <td><?= e($produs['stoc']) ?> buc.</td>
                            <td>
                                <span class="status">
                                    <?= $produs['stoc'] > 0 ? 'Disponibil' : 'Epuizat' ?>
                                </span>
                            </td>

                            <td>
                                <a class="btn edit-btn"
                                   href="admin_product.php?id=<?= (int)$produs['id_produs'] ?>">
                                    Editează
                                </a>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                    </tbody>
                </table>

            </div>

        </section>

    </main>

</div>

<script>

    const menuButtons = document.querySelectorAll('.menu-btn');
    const sections = document.querySelectorAll('.admin-section');

    menuButtons.forEach(button => {

        button.addEventListener('click', () => {

            menuButtons.forEach(btn => {
                btn.classList.remove('active');
            });

            sections.forEach(section => {
                section.classList.remove('active');
            });

            button.classList.add('active');

            document.getElementById(
                button.dataset.section
            ).classList.add('active');

        });

    });

    document.querySelectorAll('.search').forEach(input => {

        const box = input.closest('.table-box');
        const pagination = box.querySelector('.pagination');

        let page = 1;
        const pageSize = 3;

        function render() {

            const rows = [...box.querySelectorAll('tbody tr')];

            const filtered = rows.filter(row =>
                row.textContent.toLowerCase().includes(
                    input.value.toLowerCase()
                )
            );

            const pages = Math.max(1, Math.ceil(filtered.length / pageSize));

            page = Math.min(page, pages);

            rows.forEach(row => row.hidden = true);

            filtered.slice(
                (page - 1) * pageSize,
                page * pageSize
            ).forEach(row => row.hidden = false);

            pagination.innerHTML = '';

            for (let i = 1; i <= pages; i++) {

                const button = document.createElement('button');

                button.textContent = i;
                button.className = 'btn';
                button.disabled = i === page;

                button.onclick = () => {
                    page = i;
                    render();
                };

                pagination.appendChild(button);
            }
        }

        input.addEventListener('input', () => {
            page = 1;
            render();
        });

        box.refreshTable = render;

        render();

    });

    function stergeRand(button) {

        if (confirm('Sigur dorești să ștergi această înregistrare demonstrativă?')) {

            const box = button.closest('.table-box');

            button.closest('tr').remove();

            if (box.refreshTable) {
                box.refreshTable();
            }

        }

    }

</script>

</body>
</html>