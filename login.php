<?php
$pageTitle = "Autentificare - Flower Studio";
ob_start();
?>

<link rel="stylesheet" href="css/forms.css">

<section class="form-section">

    <div class="form-card">

        <h1>Bine ai revenit!</h1>

        <p class="form-subtitle">
            Autentifică-te în contul tău Flower Studio.
        </p>

        <form class="validate-form" novalidate>

            <div class="form-group">
                <label for="email">E-mail</label>

                <input type="email"
                       id="email"
                       name="email"
                       placeholder="exemplu@email.com"
                       data-validate="email">

                <small class="field-error"></small>
            </div>

            <div class="form-group">
                <label for="password">Parolă</label>

                <input type="password"
                       id="password"
                       name="password"
                       placeholder="Introdu parola"
                       data-validate="password">

                <small class="field-error"></small>
            </div>

            <button type="submit" class="form-button">
                Autentificare
            </button>

            <div class="form-success" hidden>
                Datele sunt valide. Autentificare demonstrativă.
            </div>

        </form>

        <p class="form-link">
            Nu ai un cont?
            <a href="register.php">Creează un cont</a>
        </p>

    </div>

</section>

<script src="js/validation.js" defer></script>

<?php
$content = ob_get_clean();
require __DIR__ . '/src/app/layout.php';
?>