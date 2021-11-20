window._ = require('lodash');


/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

// window.axios.defaults.baseURL = '/api/desktop/v1';
window.axios.defaults.baseURL = '/';

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.user = document.head.querySelector('meta[name="user"]') != null ?
    document.head.querySelector('meta[name="user"]').content : null;

if (window.user) {
    window.user = JSON.parse(window.user)
    window.user.is_transporter = window.user.roles.filter(item => item.name === "transporter").length > 0 || false;
    window.user.is_customer = window.user.roles.filter(item => item.name === "customer").length > 0 || false;
    window.user.is_admin = window.user.roles.filter(item => item.name === "admin").length > 0 || false;
    window.user.is_guest = false
} else {
    window.user = {}
    window.user.is_transporter = false;
    window.user.is_customer = false
    window.user.is_admin = false
    window.user.is_guest = true

}
window.locale = document.documentElement.lang

window.csrf = document.head.querySelector('meta[name="csrf-token"]').content


/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });


var Pusher = require('pusher-js');

Pusher.logToConsole = false;

var pusher = new Pusher('e4a064fd6ecf04afd75e', {
    cluster: 'eu',
    forceTLS: true
});
window.pusher = pusher;

