<?php
ob_start();
?>

<main>
    <h2>Flower Studio</h2>
    <p>Fiecare buchet spune o poveste.</p>
</main>

<?php
$content = ob_get_clean();

require __DIR__ . '/src/app/layout.php';
?>