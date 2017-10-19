
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.activated = (...ids) => {
    document.addEventListener('DOMContentLoaded', function () {
        ids.forEach((id) => {
            document.getElementById(id).classList.add('active');
        });
    });
};
