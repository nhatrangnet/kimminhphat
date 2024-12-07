import './bootstrap';

// Import all of Bootstrap's JS
import * as Popper from '@popperjs/core';
window.Popper = Popper;
import 'bootstrap';


import AOS from 'aos';
AOS.init();

import './script.js';