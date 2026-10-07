import './bootstrap';
import * as bootstrap from 'bootstrap';
import 'admin-lte/dist/js/adminlte.min.js';
import Alpine from 'alpinejs';
import TomSelect from 'tom-select';
import ApexCharts from 'apexcharts';
import jQuery from 'jquery';
import DataTable from 'datatables.net-bs5';

window.bootstrap = bootstrap;
window.Alpine = Alpine;
window.TomSelect = TomSelect;
window.ApexCharts = ApexCharts;
window.$ = window.jQuery = jQuery;

Alpine.start();

// Auto-init Tom Select untuk semua select.tom-select
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('select.tom-select').forEach((el) => {
    if (!el.tomselect) {
      new TomSelect(el, {
        create: false,
        allowEmptyOption: true,
        placeholder: el.getAttribute('placeholder') || 'Ketik untuk mencari...',
      });
    }
  });
});
