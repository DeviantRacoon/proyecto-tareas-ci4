<?php

/**
 * Botón con confirmación vía modal (Bootstrap 5)
 * Requiere que exista un modal con ID #confirmModal en la página
 */
$uid = uniqid('confirmBtn_');
?>
<button type="button"
    class="dropdown-item d-flex align-items-center gap-2"
    data-bs-toggle="modal"
    data-bs-target="#confirmModal"
    data-url="<?= esc($url) ?>"
    data-method="<?= esc($method) ?>"
    data-icon="<?= esc($icon) ?>"
    data-label="<?= esc($label) ?>"
    id="<?= $uid ?>">
    <i class="<?= esc($icon) ?>"></i> <?= esc($label) ?>
</button>