<?php

require __DIR__ . '/src/lib/produse_mock.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$produsSelectat = null;

if ($id) {
    foreach ($produse as $produs) {
        if ($produs['id_produs'] == $id) {
            $produsSelectat = $produs;
            break;
        }
    }
}

if ($id && !$produsSelectat) {
    http_response_code(404);
    exit('Produsul nu a fost găsit.');
}

$editare = $produsSelectat !== null;

function valoare($produs, $camp) {
    return htmlspecialchars(
        (string)($produs[$camp] ?? ''),
        ENT_QUOTES,
        'UTF-8'
    );
}

?>

<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Gestionare produse - Flower Studio</title>

    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/forms.css">

    <style>
        body {
            margin: 0;
            background: #F8F3ED;
            font-family: Georgia, serif;
            color: #435640;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 25px;
            color: #435640;
            text-decoration: none;
        }
    </style>

</head>

<body>

<section class="form-section">

    <div class="form-card admin-form">

        <a href="admin.php" class="back-link">
            ← Înapoi la panoul de administrare
        </a>

        <h1>
            <?= $editare ? 'Editează produsul' : 'Adaugă produs' ?>
        </h1>

        <p class="form-subtitle">
            Completează informațiile despre produs.
        </p>

        <form class="validate-form" novalidate>

            <div class="form-group">
                <label>Denumirea produsului</label>

                <input type="text"
                       name="denumire"
                       value="<?= valoare($produsSelectat, 'denumire') ?>"
                       data-validate="name">

                <small class="field-error"></small>
            </div>

            <div class="form-group">
                <label>Categoria</label>

                <select name="id_categorie"
                        data-validate="required">

                    <option value="">Selectează categoria</option>

                    <option value="1"
                        <?= ($produsSelectat['id_categorie'] ?? 0) == 1 ? 'selected' : '' ?>>
                        Trandafiri
                    </option>

                    <option value="2"
                        <?= ($produsSelectat['id_categorie'] ?? 0) == 2 ? 'selected' : '' ?>>
                        Lalele
                    </option>

                    <option value="3"
                        <?= ($produsSelectat['id_categorie'] ?? 0) == 3 ? 'selected' : '' ?>>
                        Bujori
                    </option>

                </select>

                <small class="field-error"></small>
            </div>

            <div class="form-group">
                <label>Descriere</label>

                <textarea name="descriere"
                          data-validate="message"><?= valoare($produsSelectat, 'descriere') ?></textarea>

                <small class="field-error"></small>
            </div>

            <div class="form-group">
                <label>Preț (MDL)</label>

                <input type="number"
                       name="pret_lei"
                       min="0.01"
                       step="0.01"
                       value="<?= valoare($produsSelectat, 'pret_lei') ?>"
                       data-validate="price">

                <small class="field-error"></small>
            </div>

            <div class="form-group">
                <label>Stoc disponibil</label>

                <input type="number"
                       name="stoc"
                       min="0"
                       step="1"
                       value="<?= valoare($produsSelectat, 'stoc') ?>"
                       data-validate="stock">

                <small class="field-error"></small>
            </div>

            <div class="form-group">
                <label>Culoare</label>

                <input type="text"
                       name="culoare"
                       value="<?= valoare($produsSelectat, 'culoare') ?>"
                       data-validate="name">

                <small class="field-error"></small>
            </div>

            <div class="form-group">
                <label>Ocazie</label>

                <input type="text"
                       name="ocazie"
                       value="<?= valoare($produsSelectat, 'ocazie') ?>"
                       data-validate="name">

                <small class="field-error"></small>
            </div>

            <div class="form-group">
                <label>Adresa imaginii</label>

                <input type="text"
                       name="imagine"
                       value="<?= valoare($produsSelectat, 'imagine') ?>"
                       data-validate="required">

                <small class="field-error"></small>
            </div>

            <button type="submit" class="form-button">
                <?= $editare ? 'Salvează modificările' : 'Adaugă produsul' ?>
            </button>

            <div class="form-success" hidden>
                Datele produsului sunt valide.
                Salvare demonstrativă.
            </div>

        </form>

    </div>

</section>

<script src="js/validation.js" defer></script>

</body>
</html>