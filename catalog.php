
<?php

require __DIR__ . '/src/lib/produse_mock.php';

$pageTitle = 'Catalog - Flower Studio';

ob_start();
?>

<main>

    <section class="page-banner">

        <span class="eyebrow">FLOWER STUDIO COLLECTION</span>

        <h1>Catalog de buchete</h1>

        <p>Descoperă colecția noastră de flori și buchete.</p>

    </section>

    <section class="section">

        <div class="section-heading">

            <h2>Alege buchetul potrivit</h2>

            <p>Aranjamente florale pentru fiecare ocazie.</p>

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

                            <span class="stock">
                                În stoc
                            </span>

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

    </section>

</main>

<?php

$content = ob_get_clean();

require __DIR__ . '/src/app/layout.php';
?>
