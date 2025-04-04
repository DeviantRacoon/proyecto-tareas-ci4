export function showToast(selector = '.toast') {
  const toastEl = document.querySelector(selector);
  if (toastEl) {
    const toast = new bootstrap.Toast(toastEl, { delay: 3000 });

    setTimeout(() => {
      toast.show();
    }, 10); 

    toastEl.addEventListener('hide.bs.toast', () => {
      toastEl.classList.add('fade-out');
    });

    toastEl.addEventListener('hidden.bs.toast', () => {
      toastEl.remove();
    });
  }
}
