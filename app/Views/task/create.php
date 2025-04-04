<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
<?= isset($task) ? 'Editar Tarea' : 'Crear Tarea' ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?= view('components/header', [
  'title' => isset($task) ? 'Editar tarea' : 'Crear tarea',
  'description' => isset($task) ? 'Modifica la tarea seleccionada.' : 'Aquí puedes crear una nueva tarea.',
  'actions' => []
]) ?>

<div class="card border-0 shadow-sm">
  <div class="card-body">
    <form action="<?= site_url(isset($task) ? 'task/update' . '/' . $task['id'] : 'task/save') ?>" method="post">
      <?= csrf_field() ?>
      <?php if (isset($task)): ?>
        <input type="hidden" name="_method" value="PUT">
      <?php endif ?>

      <div class="mb-3">
        <label for="title" class="form-label">Título</label>
        <input
          type="text"
          name="title"
          id="title"
          class="form-control <?= session('errors.title') ? 'is-invalid' : '' ?>"
          value="<?= old('title', $task['title'] ?? '') ?>"
          placeholder="Ej. Redactar informe mensual">
        <div class="invalid-feedback">
          <?= session('errors.title') ?>
        </div>
      </div>

      <div class="mb-3">
        <label for="task_ds" class="form-label">Descripción</label>
        <textarea
          name="task_ds"
          id="task_ds"
          rows="4"
          class="form-control <?= session('errors.task_ds') ? 'is-invalid' : '' ?>"
          placeholder="Describe los detalles de la tarea"><?= old('task_ds', $task['task_ds'] ?? '') ?></textarea>
        <div class="invalid-feedback">
          <?= session('errors.task_ds') ?>
        </div>
      </div>

      <?php if (isset($task)): ?>
        <div class="mb-3">
          <label for="task_state" class="form-label">Estado</label>
          <select
            name="task_state"
            id="task_state"
            class="form-select <?= session('errors.task_state') ? 'is-invalid' : '' ?>">
            <option value="">Selecciona un estado</option>
            <?php
            $statuses = ['pendiente', 'en progreso', 'completada'];
            $selected = old('task_state', $task['task_state'] ?? '');
            ?>
            <?php foreach ($statuses as $s): ?>
              <option value="<?= $s ?>" <?= $selected === $s ? 'selected' : '' ?>>
                <?= ucfirst($s) ?>
              </option>
            <?php endforeach ?>
          </select>
          <div class="invalid-feedback">
            <?= session('errors.status') ?>
          </div>
        </div>
      <?php endif; ?>

      <div class="d-flex justify-content-end gap-2">
        <a href="<?= site_url('task') ?>" class="btn btn-outline-light text-secondary border">
          <i class="bi bi-x-circle"></i> Cancelar
        </a>
        <button type="submit" class="btn btn-primary">
          <i class="bi bi-check-circle"></i>
          <?= isset($task) ? 'Actualizar Tarea' : 'Guardar Tarea' ?>
        </button>
      </div>
    </form>
  </div>
</div>

<?= $this->endSection() ?>