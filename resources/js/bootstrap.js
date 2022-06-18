window._ = require("lodash");

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

try {
  window.Popper = require('popper.js').default;
  window.$ = window.jQuery = require('jquery');

  require('bootstrap');
} catch (e) {}


import OverlayScrollbars from 'overlayscrollbars';
document.addEventListener("DOMContentLoaded", function () {
  //The first argument are the elements to which the plugin shall be initialized
  //The second argument has to be at least a empty object or a object with your desired options
  OverlayScrollbars(document.querySelectorAll("body"), {});
});
