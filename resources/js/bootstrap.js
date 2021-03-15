window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});


window.alertify = require('alertifyjs');

import * as filepond from 'filepond';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginFilePoster from 'filepond-plugin-file-poster';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';


window.filepond = filepond;

window.filepond.registerPlugin(FilePondPluginImagePreview);
window.filepond.registerPlugin(FilePondPluginFileValidateType);
FilePondPluginFilePoster.filePosterHeight = '200px'
window.filepond.registerPlugin(FilePondPluginFilePoster);

import Cookies from 'js-cookie';

window.Cookies = Cookies;

// core version + navigation, pagination modules:
import SwiperCore, { Navigation, Pagination, Swiper, Thumbs } from 'swiper/core';

// configure Swiper to use modules
SwiperCore.use([Navigation, Pagination, Thumbs]);

// init Swiper:
window.Swiper = Swiper;
