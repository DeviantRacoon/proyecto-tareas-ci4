<?php if (isset($filters)): ?>
  <div class="row g-2 justify-content-end">
    <div class="col-12 col-md-auto">
      <div class="dropdown w-100">
        <button class="btn btn-outline-light border-1 border text-secondary dropdown-toggle w-100" type="button" id="filtrosDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-funnel-fill"></i>
          Filtros
        </button>
        <ul class="dropdown-menu border-0 shadow-sm bg-body p-2 w-100" aria-labelledby="filtrosDropdown" style="min-width: 300px">
          <?php foreach ($filters as $filter): ?>
            <div class="mb-3">
              <label for="<?= esc($filter['key']) ?>" class="form-label"><?= esc($filter['label']) ?></label>
              <select class="form-select filtro-select" id="<?= esc($filter['key']) ?>" name="<?= esc($filter['key']) ?>">
                <option value="" <?= (empty($filter['value']) ? 'selected' : '') ?>>Seleccione una opción</option>
                <?php foreach ($filter['options'] as $option): ?>
                  <option value="<?= esc($option['value']) ?>" <?= (esc($filter['value']) === esc($option['value']) ? 'selected' : '') ?>>
                    <?= esc($option['label']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <div class="col-12 col-md-auto">
      <a href="<?= current_url() ?>" class="btn btn-outline-light border text-secondary w-100">
        <i class="bi bi-trash"></i>
      </a>
    </div>
  </div>
<?php endif ?>