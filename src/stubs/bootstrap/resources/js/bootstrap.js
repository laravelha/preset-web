window._ = require('lodash');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

// bootstrap-datepicker
require('bootstrap-datepicker');

// select2
require("select2");

// jquery mask
require('jquery-mask-plugin/dist/jquery.mask.min');
