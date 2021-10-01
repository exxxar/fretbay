importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyCARQA652wHZLjeRHWXqULVKtkWzbPIzjA",
    authDomain: "allotrans-ba936.firebaseapp.com",
    projectId: "allotrans-ba936",
    storageBucket: "allotrans-ba936.appspot.com",
    messagingSenderId: "575849939548",
    appId: "1:575849939548:web:aefcdc86afe3f9916ddc99"
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});
