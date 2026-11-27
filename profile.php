<!DOCTYPE html>
<html lang="ro">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profilul meu - Flower Studio</title>

    <link rel="stylesheet" href="css/style.css">

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #F8F3ED;
            color: #435640;
            font-family: Georgia, serif;
        }

        .profile-hero {
            background: #F2E1E3;
            text-align: center;
            padding: 65px 20px;
        }

        .profile-hero span {
            letter-spacing: 4px;
            font-size: 12px;
        }

        .profile-hero h1 {
            font-size: 46px;
            font-weight: normal;
            margin: 20px 0;
        }

        .profile-container {
            max-width: 1250px;
            margin: 60px auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 30px;
        }

        .profile-sidebar,
        .profile-content {
            background: white;
            border-radius: 12px;
            padding: 30px;
        }

        .profile-sidebar {
            text-align: center;
            align-self: start;
        }

        .profile-avatar {
            width: 90px;
            height: 90px;
            background: #DCE6D7;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            font-size: 35px;
        }

        .profile-menu {
            margin-top: 30px;
        }

        .profile-menu button {
            display: block;
            width: 100%;
            text-align: left;
            padding: 15px;
            border: none;
            background: transparent;
            color: #435640;
            font-family: Georgia, serif;
            cursor: pointer;
            margin-bottom: 8px;
            border-radius: 5px;
        }

        .profile-menu button.active {
            background: #DCE6D7;
        }

        .profile-section {
            display: none;
        }

        .profile-section.active {
            display: block;
        }

        .profile-content h2 {
            font-size: 32px;
            font-weight: normal;
            margin-top: 0;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #FAF8F6;
            font-family: Georgia, serif;
            color: #435640;
        }

        .form-group input.invalid {
            border-color: #B84040;
        }

        .error {
            color: #B84040;
            font-size: 13px;
            display: block;
            margin-top: 6px;
            min-height: 16px;
        }

        .save-btn {
            background: #435640;
            color: white;
            border: none;
            padding: 15px 25px;
            border-radius: 5px;
            cursor: pointer;
            font-family: Georgia, serif;
        }

        .success-message {
            color: #435640;
            background: #DCE6D7;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .profile-table {
            width: 100%;
            border-collapse: collapse;
        }

        .profile-table th,
        .profile-table td {
            padding: 15px 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .profile-table th {
            background: #DCE6D7;
        }

        @media (max-width: 750px) {

            .profile-container,
            .form-grid {
                grid-template-columns: 1fr;
            }

            .profile-content {
                overflow-x: auto;
            }

        }

    </style>

</head>

<body>

<?php require __DIR__ . '/src/components/header.php'; ?>

<section class="profile-hero">

    <span>CONTUL MEU</span>

    <h1>Profilul meu</h1>

    <p>Gestionează datele personale și comenzile tale.</p>

</section>

<div class="profile-container">

    <aside class="profile-sidebar">

        <div class="profile-avatar">♙</div>

        <h2 id="profileName">Maria Popescu</h2>

        <p>Client Flower Studio</p>

        <div class="profile-menu">

            <button class="active" data-tab="date">
                Date personale
            </button>

            <button data-tab="istoric">
                Comenzile mele
            </button>

            <button data-tab="favorite">
                Favorite
            </button>

        </div>

    </aside>

    <main class="profile-content">

        <!-- DATE PERSONALE -->

        <section id="date" class="profile-section active">

            <h2>Date personale</h2>

            <form id="profileForm" novalidate>

                <div class="form-grid">

                    <div class="form-group">
                        <label for="prenume">Prenume</label>
                        <input type="text" id="prenume" value="Maria">
                        <small class="error"></small>
                    </div>

                    <div class="form-group">
                        <label for="nume">Nume</label>
                        <input type="text" id="nume" value="Popescu">
                        <small class="error"></small>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" value="maria@example.com">
                        <small class="error"></small>
                    </div>

                    <div class="form-group">
                        <label for="telefon">Telefon</label>
                        <input type="tel" id="telefon" placeholder="+373 XX XXX XXX">
                        <small class="error"></small>
                    </div>

                </div>

                <div class="form-group">

                    <label for="adresa">Adresa de livrare</label>

                    <input type="text"
                           id="adresa"
                           value="Cahul, Republica Moldova">

                    <small class="error"></small>

                </div>

                <button type="submit" class="save-btn">
                    Salvează modificările
                </button>

                <div id="successMessage"
                     class="success-message"
                     hidden>
                    Datele au fost validate și actualizate demonstrativ.
                </div>

            </form>

        </section>

        <!-- COMENZILE MELE -->

        <section id="istoric" class="profile-section">

            <h2>Comenzile mele</h2>

            <table class="profile-table">

                <thead>
                    <tr>
                        <th>Comandă</th>
                        <th>Produs</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>#001</td>
                        <td>Rose Elegance</td>
                        <td>650 MDL</td>
                        <td>Livrată</td>
                    </tr>

                    <tr>
                        <td>#004</td>
                        <td>Buchet personalizat</td>
                        <td>800 MDL</td>
                        <td>În pregătire</td>
                    </tr>
                </tbody>

            </table>

        </section>

        <!-- FAVORITE -->

        <section id="favorite" class="profile-section">

            <h2>Produse favorite</h2>

            <p>Momentan nu ai produse adăugate la favorite.</p>

            <a href="catalog.php" class="save-btn">
                Descoperă colecția
            </a>

        </section>

    </main>

</div>

<?php require __DIR__ . '/src/components/footer.php'; ?>

<script>

    const tabs = document.querySelectorAll('.profile-menu button');

    tabs.forEach(button => {

        button.addEventListener('click', () => {

            tabs.forEach(tab => {
                tab.classList.remove('active');
            });

            document.querySelectorAll('.profile-section').forEach(section => {
                section.classList.remove('active');
            });

            button.classList.add('active');

            document.getElementById(
                button.dataset.tab
            ).classList.add('active');

        });

    });

    const form = document.getElementById('profileForm');

    function validateField(id, condition, message) {

        const input = document.getElementById(id);
        const error = input.parentElement.querySelector('.error');

        input.classList.toggle('invalid', !condition);

        error.textContent = condition ? '' : message;

        return condition;

    }

    function validateForm() {

        const prenume = document.getElementById('prenume').value.trim();
        const nume = document.getElementById('nume').value.trim();
        const email = document.getElementById('email').value.trim();
        const telefon = document.getElementById('telefon').value.trim();
        const adresa = document.getElementById('adresa').value.trim();

        const validari = [

            validateField(
                'prenume',
                prenume.length >= 2,
                'Introdu un prenume valid.'
            ),

            validateField(
                'nume',
                nume.length >= 2,
                'Introdu un nume valid.'
            ),

            validateField(
                'email',
                /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email),
                'Adresa de e-mail este invalidă.'
            ),

            validateField(
                'telefon',
                /^(\+373|0)\d{8}$/.test(telefon.replace(/\s/g, '')),
                'Introdu un număr de telefon valid.'
            ),

            validateField(
                'adresa',
                adresa.length >= 5,
                'Introdu adresa de livrare.'
            )

        ];

        return validari.every(Boolean);

    }

    form.querySelectorAll('input').forEach(input => {

        input.addEventListener('input', () => {

            document.getElementById('successMessage').hidden = true;

            validateForm();

        });

    });

    form.addEventListener('submit', event => {

        event.preventDefault();

        const valid = validateForm();

        document.getElementById('successMessage').hidden = !valid;

        if (valid) {

            document.getElementById('profileName').textContent =
                document.getElementById('prenume').value.trim() + ' ' +
                document.getElementById('nume').value.trim();

        }

    });

</script>

</body>
</html>