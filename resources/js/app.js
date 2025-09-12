import './bootstrap';
import * as bootstrap from 'bootstrap';

// Agora, o nosso código de inicialização manual vai funcionar, pois a variável 'bootstrap' existe.
document.addEventListener('DOMContentLoaded', () => {
  const dropdownElementList = [].slice.call(document.querySelectorAll('[data-bs-toggle="dropdown"]'))
  
  dropdownElementList.map(function (dropdownToggleEl) {
    // A variável 'bootstrap' agora existe e tem o construtor Dropdown dentro dela.
    return new bootstrap.Dropdown(dropdownToggleEl)
  })
});