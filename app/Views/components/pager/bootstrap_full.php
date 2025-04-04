<?php

/**
 * Plantilla de paginación Bootstrap 5 para CodeIgniter 4
 * Estilo: compacto, centrado, accesible
 */
$pager->setSurroundCount(2);
?>

<nav>
  <ul class="pagination pagination-sm justify-content-end">

    <!-- Enlaces de páginas -->
    <?php foreach ($pager->links() as $link): ?>
      <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
        <a class="page-link px-2" href="<?= $link['uri'] ?>">
          <?= $link['title'] ?>
        </a>
      </li>
    <?php endforeach ?>

  </ul>
</nav>