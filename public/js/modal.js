export function setupConfirmModal(modalId = '#confirmModal') {
  const modal = document.querySelector(modalId);
  if (!modal) return;

  const form = modal.querySelector('form');
  const methodInput = modal.querySelector('input[name="_method"]');

  modal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const url = button.getAttribute('data-url');
    const method = button.getAttribute('data-method') || 'POST';

    form.setAttribute('action', url);

    if (method !== 'POST') {
      methodInput.value = method;
      methodInput.disabled = false;
    } else {
      methodInput.disabled = true;
    }
  });
}
