import { showToast } from './toast.js';
import { setupConfirmModal } from './modal.js';
import { setupFilters } from './filter.js';

document.addEventListener('DOMContentLoaded', function () {
  showToast();
  setupConfirmModal();
  setupFilters();
});
