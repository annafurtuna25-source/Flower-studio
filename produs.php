
<?php

require __DIR__ . '/src/lib/produse_mock.php';

$id = (int) ($_GET['id'] ?? 0);

$produs = null;

foreach ($produse as $element) {
    if ($element['id_produs'] === $id && $element['activ']) {
        $produs = $element;
        break;
    }
}

if (!$produs) {
    http_response_code(404);
}

$pageTitle = $produs
    ? $produs['denumire'] . ' - Flower Studio'
    : 'Produs indisponibil - Flower Studio';

ob_start();
?>

<main>

    <?php if (!$produs): ?>

        <section class="section">
            <div class="section-heading">
                <h1>Produsul nu a fost găsit</h1>

                <a href="catalog.php" class="btn">
                    Înapoi la catalog
                </a>
            </div>
        </section>

    <?php else: ?>

        <section class="section">

            <div class="breadcrumb">
                <a href="index.php">Acasă</a> /
                <a href="catalog.php">Catalog</a> /
                <?= htmlspecialchars($produs['denumire']) ?>
            </div>

            <div class="detail-grid">

                <div class="detail-image">

                    <img
                        src="<?= htmlspecialchars($produs['imagine']) ?>"
                        alt="<?= htmlspecialchars($produs['denumire']) ?>"
                    >

                </div>

                <div class="detail-info">

                    <span class="eyebrow">
                        FLOWER STUDIO COLLECTION
                    </span>

                    <h1>
                        <?= htmlspecialchars($produs['denumire']) ?>
                    </h1>

                    <div class="rating">
                        ★★★★★
                        <span>(2 recenzii demonstrative)</span>
                    </div>

                    <p class="detail-price">
                        <?= number_format($produs['pret_lei'], 2) ?> MDL
                    </p>

                    <p class="detail-description">
                        <?= htmlspecialchars($produs['descriere']) ?>
                    </p>

                    <?php if ($produs['stoc'] > 0): ?>

                        <span class="stock">
                            ✓ În stoc
                        </span>

                    <?php else: ?>

                        <span class="out-of-stock">
                            Indisponibil
                        </span>

                    <?php endif; ?>

                    <div class="detail-properties">

                        <p>
                            <strong>Culoare:</strong>
                            <?= htmlspecialchars($produs['culoare']) ?>
                        </p>

                        <p>
                            <strong>Ocazie:</strong>
                            <?= htmlspecialchars($produs['ocazie']) ?>
                        </p>

                        <p>
                            <strong>Disponibilitate:</strong>
                            <?= $produs['stoc'] ?> bucăți
                        </p>

                    </div>

                    <label>Cantitate:</label>

                    <div class="quantity-control">

                        <button type="button" id="minus">
                            −
                        </button>

                        <input
                            type="number"
                            id="quantity"
                            value="1"
                            min="1"
                            max="<?= max(1, $produs['stoc']) ?>"
                            readonly
                        >

                        <button type="button" id="plus">
                            +
                        </button>

                    </div>

                    <p class="total-price">
                        Total:
                        <strong id="totalPrice"
                            data-price="<?= $produs['pret_lei'] ?>">

                            <?= number_format($produs['pret_lei'], 2) ?> MDL

                        </strong>
                    </p>

                    <button
                        type="button"
                        class="btn detail-button"
                        id="addToCart"
                        <?= $produs['stoc'] <= 0 ? 'disabled' : '' ?>
                    >
                        Adaugă în coș
                    </button>

                    <button
                        type="button"
                        class="btn btn-outline detail-button"
                        id="favoriteButton"
                        aria-pressed="false"
                    >
                        ♡ Adaugă la favorite
                    </button>

                    <p id="productMessage"
                       class="form-message"
                       role="status"></p>

                    <div class="delivery-info">

                        <p>❀ Flori proaspete, atent selectate</p>

                        <p>✓ Livrare la domiciliu</p>

                        <p>♡ Ambalare elegantă</p>

                    </div>

                </div>

            </div>

        </section>

        <section class="section">

            <div class="section-heading">
                <h2>Informații suplimentare</h2>
            </div>

            <div class="product-extra">

                <details open>

                    <summary>Descrierea produsului</summary>

                    <p>
                        <?= htmlspecialchars($produs['descriere']) ?>
                        Un buchet pregătit cu atenție la detalii,
                        potrivit pentru a surprinde persoanele dragi.
                    </p>

                </details>

                <details>

                    <summary>Îngrijirea florilor</summary>

                    <p>
                        Schimbați apa zilnic, tăiați oblic
                        tulpinile și evitați expunerea directă
                        la soare și sursele de căldură.
                    </p>

                </details>

                <details>

                    <summary>Informații despre livrare</summary>

                    <p>
                        Livrarea va putea fi programată
                        în funcție de data și adresa
                        selectate de client.
                    </p>

                </details>

            </div>

        </section>

        <section class="section">

            <div class="section-heading">

                <h2>Recenziile clienților</h2>

                <p>Recenzii demonstrative</p>

            </div>

            <div class="review-grid">

                <div class="review-card">

                    <div class="rating">★★★★★</div>

                    <h3>Maria</h3>

                    <p>
                        Buchetul este superb!
                        Florile sunt frumoase și elegante.
                    </p>

                </div>

                <div class="review-card">

                    <div class="rating">★★★★★</div>

                    <h3>Elena</h3>

                    <p>
                        O alegere perfectă pentru un cadou.
                        Recomand cu drag!
                    </p>

                </div>

            </div>

            <div class="center-action">

                <a href="catalog.php" class="btn">
                    Înapoi la catalog
                </a>

            </div>

        </section>

    <?php endif; ?>

</main>

<?php

$content = ob_get_clean();

require __DIR__ . '/src/app/layout.php';
?>
