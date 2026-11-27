<?php
$pageTitle = "Contact - Flower Studio";
ob_start();
?>

<link rel="stylesheet" href="css/forms.css">

<section class="hero">
    <h1>Contactează-ne</h1>
    <p>Suntem aici pentru a transforma ideile tale în flori.</p>
</section>

<section class="form-section">

    <div class="form-card">

        <h1>Trimite-ne un mesaj</h1>

        <p class="form-subtitle">
            Ai întrebări despre buchete sau comenzi?
            Scrie-ne!
        </p>

        <form class="validate-form" novalidate>

            <div class="form-group">
                <label>Nume și prenume</label>
                <input type="text"
                       name="nume"
                       data-validate="name">
                <small class="field-error"></small>
            </div>

            <div class="form-group">
                <label>E-mail</label>
                <input type="email"
                       name="email"
                       data-validate="email">
                <small class="field-error"></small>
            </div>

            <div class="form-group">
                <label>Subiect</label>
                <input type="text"
                       name="subiect"
                       data-validate="name">
                <small class="field-error"></small>
            </div>

            <div class="form-group">
                <label>Mesajul tău</label>
                <textarea name="mesaj"
                          data-validate="message"></textarea>
                <small class="field-error"></small>
            </div>

            <button type="submit" class="form-button">
                Trimite mesajul
            </button>

            <div class="form-success" hidden>
                Mesajul este valid. Trimitere demonstrativă.
            </div>

        </form>

    </div>

</section>

<section style="padding: 40px 20px; text-align: center;">

    <h2>Unde ne găsești</h2>

    <p>Cahul, Republica Moldova</p>

    <p>Program demonstrativ: Luni – Duminică, 08:00 – 20:00</p>

    <iframe
        src="https://maps.google.com/maps?q=Cahul,Moldova&output=embed"
        width="100%"
        height="350"
        style="border:0; border-radius:12px;"
        title="Harta orașului Cahul"
        loading="lazy">
    </iframe>

</section>

<script src="js/validation.js" defer></script>

<?php
$content = ob_get_clean();
require __DIR__ . '/src/app/layout.php';
?>