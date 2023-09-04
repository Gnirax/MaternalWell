import './bootstrap';

import Alpine from 'alpinejs';

import inputmask from 'inputmask';

inputmask({ mask: '+99 999 999 9999', showMaskOnHover:false}).mask('#phone')
window.Alpine = Alpine;

Alpine.start();
