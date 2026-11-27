
<?php

$pageTitle = 'Despre noi - Flower Studio';

ob_start();
?>

<main>

    <section class="page-banner">

        <span class="eyebrow">POVESTEA NOASTRĂ</span>

        <h1>Despre Flower Studio</h1>

        <p>
            Pasiune pentru flori, atenție la detalii
            și emoții transformate în buchete.
        </p>

    </section>

    <section class="section">

        <div class="about-grid">

            <img
                src="https://images.pexels.com/photos/3392982/pexels-photo-3392982.jpeg?w=1000"
                alt="Flori Flower Studio"
            >

            <div class="about-text">

                <span class="eyebrow">CINE SUNTEM</span>

                <h2>Mai mult decât o florărie.</h2>

                <p>
                    Flower Studio este un concept de florărie
                    online creat din pasiunea pentru frumusețea
                    florilor și dorința de a oferi experiențe
                    deosebite clienților.
                </p>

                <p>
                    Ne propunem să oferim buchete elegante,
                    moderne și personalizate, potrivite pentru
                    aniversări, zile de naștere, evenimente
                    romantice și alte momente importante.
                </p>

                <p>
                    Conceptul nostru permite clienților să
                    aleagă florile, ambalajele, panglicile și
                    accesoriile dorite, fără a fi necesară
                    deplasarea la magazin.
                </p>

                <a href="catalog.php" class="btn">
                    Descoperă colecția
                </a>

            </div>

        </div>

    </section>

    <section class="quote">

        <h2>
            „Fiecare buchet spune o poveste.”
        </h2>

        <p>Flower Studio</p>

    </section>

    <section class="section">

        <div class="section-heading">

            <span class="eyebrow">VALORILE NOASTRE</span>

            <h2>Ce ne reprezintă</h2>

        </div>

        <div class="benefits">

            <div class="benefit">

                <div class="benefit-icon">❀</div>

                <h3>Calitate</h3>

                <p>
                    Atenție la prospețimea florilor și
                    la fiecare detaliu al compoziției.
                </p>

            </div>

            <div class="benefit">

                <div class="benefit-icon">♡</div>

                <h3>Creativitate</h3>

                <p>
                    Buchete originale, adaptate stilului
                    și preferințelor fiecărui client.
                </p>

            </div>

            <div class="benefit">

                <div class="benefit-icon">✧</div>

                <h3>Inovație</h3>

                <p>
                    O experiență digitală modernă,
                    cu posibilitatea personalizării
                    buchetelor online.
                </p>

            </div>

        </div>

    </section>

</main>

<?php

$content = ob_get_clean();

require __DIR__ . '/src/app/layout.php';
?>
