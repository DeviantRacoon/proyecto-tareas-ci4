<?php if (isset($title) && isset($actions)): ?>
  <div class="bg-body rounded shadow-sm border-0 card-body p-3 mb-3">
    <div class="row g-3 justify-content-between align-items-center">
      <div class="col-12 col-md">
        <h3 class="fw-bold mb-0"><?= esc($title) ?></h3>
        <?php if (!empty($description)): ?>
          <p class="text-muted mb-0"><?= esc($description) ?></p>
        <?php endif; ?>
      </div>

      <?php if (!empty($actions)): ?>
        <div class="col-12 col-md-auto d-flex gap-2 justify-content-md-end flex-wrap">
          <?php foreach ($actions as $action): ?>
            <a href="<?= esc($action['url']) ?>" class="btn btn-<?= esc($action['color']) ?>">
              <i class="<?= esc($action['icon']) ?>"></i>
              <?= esc($action['label']) ?>
            </a>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
<?php endif ?>