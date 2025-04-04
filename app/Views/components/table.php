<?php

/**
 * Componente: Tabla reutilizable optimizada con acciones via JavaScript + paginación
 * Requiere:
 * - array $columns
 * - array|object $rows
 * - array $actions (recomendado: preprocesados)
 * - CodeIgniter\Pager\Pager $pager (opcional)
 */
?>

<?php if (isset($columns, $rows)): ?>
  <article class="card card-body shadow-sm border-0">
    <div class="row justify-content-end align-items-center g-3">
      <div class="col-12 col-md-auto">
        <?= view('components/filters', [
          'filters' => $filters,
        ]) ?>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead>
          <tr>
            <?php foreach ($columns as $col): ?>
              <th class="text-<?= $col['textAlign'] ?? 'left' ?>">
                <?= esc($col['name']) ?>
              </th>
            <?php endforeach; ?>
            <?php if (!empty($actions)): ?>
              <th class="text-end"></th>
            <?php endif ?>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($rows as $row): ?>
            <tr>
              <?php foreach ($columns as $col): ?>
                <?php
                $key = $col['key'];
                $value = $row[$key] ?? ($col['defaultValue'] ?? '');

                $variant = 'secondary text-white';
                if ($value === 'completada') {
                  $variant = 'success text-white';
                } elseif ($value === 'en progreso') {
                  $variant = 'warning';
                }

                $type = $col['type'] ?? 'text';
                $overflow = $col['overflow'] ?? false;
                $displayValue = $value;

                if ($type === 'date') {
                  $displayValue = date('d/m/Y', strtotime($value));
                } elseif ($type === 'datetime') {
                  $displayValue = date('d/m/Y H:i', strtotime($value));
                } elseif ($type === 'status') {
                  $displayValue = '<span class="badge bg-' . $variant . '">' . esc(strtoupper($value)) . '</span>';
                } elseif ($overflow) {
                  $displayValue = esc(strlen($value) > 30 ? substr($value, 0, 30) . '…' : $value);
                }
                ?>
                <td class="text-<?= $col['textAlign'] ?? 'left' ?>" <?= $overflow ? 'title="' . esc($value) . '"' : '' ?>>
                  <?= ($type === 'status') ? $displayValue : $displayValue ?>
                </td>
              <?php endforeach; ?>

              <?php if (!empty($actions)): ?>
                <td class="text-end">
                  <div class="dropdown">
                    <i class="bi bi-three-dots" type="button" id="dropdownActions<?= $row['id'] ?? uniqid() ?>" data-bs-toggle="dropdown" aria-expanded="false"></i>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownActions<?= $row['id'] ?? uniqid() ?>">
                      <?php foreach ($actions as $action): ?>
                        <?php
                        $hide = $action['hidden'] ?? null;
                        if (is_callable($hide) && $hide($row)) continue;

                        $url = is_callable($action['url']) ? $action['url']($row) : '#';
                        $icon = $action['icon'] ?? '';
                        $label = $action['label'] ?? '';
                        $method = strtoupper($action['method'] ?? 'GET');
                        ?>

                        <?php if (in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE'])): ?>
                          <li>
                            <?= view('components/button_confirm', [
                              'url' => $url,
                              'icon' => $icon,
                              'label' => $label,
                              'method' => $method
                            ]) ?>
                          </li>
                        <?php else: ?>
                          <li>
                            <a href="<?= esc($url) ?>" class="dropdown-item d-flex align-items-center gap-2">
                              <i class="<?= esc($icon) ?>"></i> <?= esc($label) ?>
                            </a>
                          </li>
                        <?php endif; ?>
                      <?php endforeach ?>
                    </ul>
                  </div>
                </td>
              <?php endif ?>

            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>

    <?php if (isset($pager) && $pager instanceof \CodeIgniter\Pager\Pager): ?>
      <div class="mt-3">
        <?= $pager->links('default', 'bootstrap_full') ?>
      </div>
    <?php endif ?>
  </article>
<?php endif ?>