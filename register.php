<?php
$pageTitle = "Înregistrare - Flower Studio";
ob_start();
?>

<link rel="stylesheet" href="css/forms.css">

<section class="form-section">

    <div class="form-card">

        <h1>Creează un cont</h1>

        <p class="form-subtitle">
            Descoperă universul Flower Studio.
        </p>

        <form class="validate-form" novalidate>

            <div class="form-group">
                <label>Prenume</label>
                <input type="text"
                       name="prenume"
                       placeholder="Prenumele tău"
                       data-validate="name">
                <small class="field-error"></small>
            </div>

            <div class="form-group">
                <label>Nume</label>
                <input type="text"
                       name="nume"
                       placeholder="Numele tău"
                       data-validate="name">
                <small class="field-error"></small>
            </div>

            <div class="form-group">
                <label>E-mail</label>
                <input type="email"
                       name="email"
                       placeholder="exemplu@email.com"
                       data-validate="email">
                <small class="field-error"></small>
            </div>

            <div class="form-group">
                <label>Telefon</label>
                <input type="tel"
                       name="telefon"
                       placeholder="+373"
                       data-validate="phone">
                <small class="field-error"></small>
            </div>

            <div class="form-group">
                <label>Parolă</label>
                <input type="password"
                       name="password"
                       placeholder="Minimum 8 caractere"
                       data-validate="password">
                <small class="field-error"></small>
            </div>

            <div class="form-group">
                <label>Confirmă parola</label>
                <input type="password"
                       name="confirm_password"
                       placeholder="Repetă parola"
                       data-validate="confirm">
                <small class="field-error"></small>
            </div>

            <button type="submit" class="form-button">
                Creează contul
            </button>

            <div class="form-success" hidden>
                Datele sunt valide. Înregistrare demonstrativă.
            </div>

        </form>

        <p class="form-link">
            Ai deja un cont?
            <a href="login.php">Autentifică-te</a>
        </p>

    </div>

</section>

<script src="js/validation.js" defer></script>

<?php
$content = ob_get_clean();
require __DIR__ . '/src/app/layout.php';
?>