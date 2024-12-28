import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm';
Livewire.start()

// Import all of Bootstrap's JS
import * as Popper from '@popperjs/core';
window.Popper = Popper;
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import './bootstrap';


import AOS from 'aos';
AOS.init();

import './script.js';