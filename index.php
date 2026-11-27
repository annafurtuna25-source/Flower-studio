
<?php

require __DIR__ . '/src/lib/produse_mock.php';

$pageTitle = 'Flower Studio - Florărie online';

ob_start();
?>

<main>

    <section class="hero">
        <span class="eyebrow">FLOWER STUDIO</span>

        <h1>Fiecare buchet spune o poveste.</h1>

        <p>
            Descoperă frumusețea florilor și alege buchetul
            potrivit pentru fiecare moment special.
        </p>

        <a href="catalog.php" class="btn">
            Descoperă colecția
        </a>
    </section>

    <section class="section" id="produse">

        <div class="section-heading">
            <h2>Buchete recomandate</h2>
            <p>Flori alese cu grijă pentru momente de neuitat.</p>
        </div>

        <div class="filters">
            <button class="filter-btn active" data-filter="all">
                Toate produsele
            </button>

            <button class="filter-btn" data-filter="under500">
                Sub 500 MDL
            </button>

            <button class="filter-btn" data-filter="500to700">
                500–700 MDL
            </button>

            <button class="filter-btn" data-filter="over700">
                Peste 700 MDL
            </button>
        </div>

        <div class="products-grid">

            <?php foreach ($produse as $produs): ?>

                <?php if (!$produs['activ']) continue; ?>

                <article class="product-card"
                         data-price="<?= $produs['pret_lei'] ?>">

                    <div class="product-image">

                        <?php if ($produs['recomandat']): ?>
                            <span class="product-badge">
                                Recomandat
                            </span>
                        <?php endif; ?>

                        <a href="produs.php?id=<?= $produs['id_produs'] ?>">

                            <img
                                src="<?= htmlspecialchars($produs['imagine']) ?>"
                                alt="<?= htmlspecialchars($produs['denumire']) ?>"
                            >

                        </a>

                    </div>

                    <div class="product-info">

                        <h3>
                            <a href="produs.php?id=<?= $produs['id_produs'] ?>">
                                <?= htmlspecialchars($produs['denumire']) ?>
                            </a>
                        </h3>

                        <p>
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

                        <a href="produs.php?id=<?= $produs['id_produs'] ?>"
                           class="btn product-detail-btn">

                            Vezi detalii

                        </a>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>

        <div class="center-action">
            <a href="catalog.php" class="btn btn-outline">
                Vezi toate buchetele
            </a>
        </div>

    </section>

    <section class="section">

        <div class="section-heading">
            <h2>De ce Flower Studio?</h2>
        </div>

        <div class="benefits-grid">

            <div class="benefit-card">
                <div class="benefit-icon">❀</div>
                <h3>Flori proaspete</h3>
                <p>Flori selectate cu atenție și grijă.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">♡</div>
                <h3>Buchete personalizate</h3>
                <p>Aranjamente adaptate preferințelor tale.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">✓</div>
                <h3>Livrare la domiciliu</h3>
                <p>Surprize frumoase pentru persoanele dragi.</p>
            </div>

        </div>

    </section>

</main>

<?php

$content = ob_get_clean();

require __DIR__ . '/src/app/layout.php';
?>
