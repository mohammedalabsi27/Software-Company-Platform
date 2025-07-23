/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

console.log("hello");

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
    wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
    wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
    wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});

if (window.Echo) {
    const userId = document.querySelector('meta[name="user-id"]').content ?? null;
    if (userId) {
        window.Echo.private(`user.${userId}`)
            .listen('.request.updated', (data) => {
                if (window.toastr) {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        positionClass: "toast-top-right",
                        timeOut: "7000"
                    };
                    toastr.success(data.message, data.title);
                }
    
                // // تحديث عدد الإشعارات في الجرس
                // const countEl = document.querySelector('.badge.bg-danger');
                // if (countEl) {
                //     countEl.textContent = parseInt(countEl.textContent || '0') + 1;
                // }
    
                $("#notificationCount").load(" #notificationCount > *");
                $("#notificationList").load(" #notificationList > *");
            });
    } else {
        console.warn('User ID meta tag not found or empty. User-specific events will not be received.');
    }
}



if (window.Echo) {
    const adminId = document.querySelector('meta[name="admin-id"]').content ?? null;
    if (adminId) {
        console.log('Listening for notifications for Admin ID:', adminId);
        window.Echo.private(`App.Models.Admin.${adminId}`)
            .notification((notification) => {

                if (window.toastr) {
                    toastr.success('A New Service Request from user ');
                }

                const unreadCountElement = document.getElementById('unread-notifications-count');
                if (unreadCountElement) {
                    let currentCount = parseInt(unreadCountElement.textContent || '0');
                    unreadCountElement.textContent = currentCount + 1;
                }

                $("#notificationsModal").load(" #notificationsModal > *");
    
                // // تحديث المودال بالـ notifications الجدد
                // fetch("/admin/notifications")
                //     .then(res => res.text())
                //     .then(html => {
                //         document.getElementById("adminNotificationList").innerHTML = html;
                //     });
    
                // // تفعيل علامة الإشعار (النقطة الخضراء)
                // document.querySelector('.nav-notif .dot').classList.add('bg-danger');
            });
    } else {
        console.warn('Admin ID meta tag not found or empty. Admin notifications will not be received.');
    }
}

