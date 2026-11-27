
<?php
require __DIR__ . '/src/lib/produse_mock.php';

ob_start();
?>

<main>

    <section class="hero">

        <span class="hero-label">FLOWER STUDIO</span>

        <h2>Fiecare buchet spune o poveste.</h2>

        <p>
            Descoperă frumusețea florilor și alege
            buchetul potrivit pentru fiecare moment special.
        </p>

        <a href="#catalog" class="btn">
            Descoperă colecția
        </a>

    </section>

    <section class="catalog" id="catalog">

        <h2>Buchete recomandate</h2>

        <p class="subtitle">
            Flori alese cu grijă pentru momente de neuitat.
        </p>

        <!-- Butoane de filtrare -->

        <div class="filters">

            <button class="filter-btn active"
                    data-filter="all">
                Toate produsele
            </button>

            <button class="filter-btn"
                    data-filter="low">
                Sub 500 MDL
            </button>

            <button class="filter-btn"
                    data-filter="medium">
                500–700 MDL
            </button>

            <button class="filter-btn"
                    data-filter="high">
                Peste 700 MDL
            </button>

        </div>

        <div class="product-grid">

            <?php foreach ($produse as $produs): ?>

                <article class="product-card"
                         data-price="<?= $produs['pret_lei'] ?>">

                    <div class="product-image">

                        <img
                            src="<?= htmlspecialchars($produs['imagine']) ?>"
                            alt="<?= htmlspecialchars($produs['denumire']) ?>"
                        >

                        <?php if ($produs['recomandat']): ?>

                            <span class="recommended">
                                Recomandat
                            </span>

                        <?php endif; ?>

                    </div>

                    <div class="product-info">

                        <h3>
                            <?= htmlspecialchars($produs['denumire']) ?>
                        </h3>

                        <p class="description">
                            <?= htmlspecialchars($produs['descriere']) ?>
                        </p>

                        <p class="occasion">
                            <?= htmlspecialchars($produs['ocazie']) ?>
                        </p>

                        <p class="price">
                            <?= number_format($produs['pret_lei'], 2) ?> MDL
                        </p>

                        <?php if ($produs['stoc'] > 0): ?>

                            <span class="stock">În stoc</span>

                        <?php else: ?>

                            <span class="out-of-stock">
                                Indisponibil
                            </span>

                        <?php endif; ?>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>

    </section>

</main>

<script src="js/script.js"></script>

<?php
$content = ob_get_clean();

require __DIR__ . '/src/app/layout.php';
?>
