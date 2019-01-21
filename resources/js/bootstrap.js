window._ = require('lodash');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
    require('materialize-css/dist/js/materialize.min.js')
} catch (e) {}
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

document.addEventListener('DOMContentLoaded', function() {
    M.Dropdown.init(document.querySelectorAll('.dropdown-trigger'));
    // M.Collapsible.init(document.querySelectorAll('.collapsible'));
});
