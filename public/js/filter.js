export function setupFilters() {
  document.querySelectorAll('.filtro-select').forEach(select => {
    select.addEventListener('change', function () {
      const key = this.name;
      const value = this.value;

      const url = new URL(window.location.href);
      const params = new URLSearchParams(url.search);

      if (value) {
        params.set(key, value);
      } else {
        params.delete(key);
      }

      window.location.href = url.pathname + '?' + params.toString();
    });
  });
}
