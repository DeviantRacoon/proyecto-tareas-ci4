<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form method="post" id="confirmForm" class="modal-content p-4 rounded-4 shadow-sm">
      <?= csrf_field() ?>
      <input type="hidden" name="_method" id="confirmMethod">

      <div class="d-flex align-items-start gap-3 mb-3">
        <div class="flex-grow-1">
          <h5 class="fw-semibold mb-1 text-body">¿Estás seguro?</h5>
          <p class="text-secondary small mb-0">Esta acción puede tener consecuencias importantes. Confirma si deseas continuar.</p>

          <div id="warningBox" class="alert alert-warning d-flex align-items-center mt-3 py-2 px-3 small d-none">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <div id="warningText">Este cambio no se puede deshacer.</div>
          </div>
        </div>
      </div>

      <div class="d-flex gap-2 mt-2">
        <button type="button" class="btn btn-outline-light border text-body" data-bs-dismiss="modal" id="cancelBtn">
          Cancelar
        </button>
        <button type="submit" class="btn btn-primary flex-grow-1 d-flex justify-content-center align-items-center" id="confirmBtn">
          <span class="spinner-border spinner-border-sm me-2 d-none" id="confirmSpinner" role="status"></span>
          <span id="confirmLabel">Sí, continuar</span>
        </button>
      </div>
    </form>
  </div>
</div>