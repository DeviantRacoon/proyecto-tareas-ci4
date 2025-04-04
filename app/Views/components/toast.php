<?php if (isset($type) && isset($message)): ?>
  <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1100">
    <div class="toast custom-toast text-white bg-<?= esc($type) ?> border-0 shadow" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          <i class="bi <?= esc($type === 'success' ? 'bi-check-circle-fill' : ($type === 'danger' ? 'bi-x-circle-fill' : ($type === 'warning' ? 'bi-exclamation-triangle-fill' : 'bi-info-circle-fill'))) ?> me-2"></i>
          <?= esc($message) ?>
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar"></button>
      </div>
    </div>
  </div>
<?php endif ?>
<script src="<?= base_url('js/toast.js') ?>"></script>