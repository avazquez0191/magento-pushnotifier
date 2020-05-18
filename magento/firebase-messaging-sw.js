importScripts('https://www.gstatic.com/firebasejs/7.14.4/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.14.4/firebase-messaging.js');
importScripts('./js/mitienda/firebase/init.js');

const messaging = firebase.messaging();

// [START background_handler]
messaging.setBackgroundMessageHandler(function (payload) {
  const notificationTitle = payload.notification.title;
  const notificationOptions = {
    body: payload.notification.body,
    icon: payload.notification.icon
  };
  return self.registration.showNotification(notificationTitle,
    notificationOptions);
});
// [END background_handler]
