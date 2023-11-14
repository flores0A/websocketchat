// public/js/service-worker.js

const CACHE_NAME = 'my-cache-v1';
const urlsToCache = [
    '/',
    '/css/app.css',
    '/js/app.js',
    // Agrega aquí otros recursos que desees precargar
];

self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then((cache) => {
                return cache.addAll(urlsToCache);
            })
    );
});

self.addEventListener('fetch', (event) => {
    event.respondWith(
        caches.match(event.request)
            .then((response) => {
                return response || fetch(event.request);
            })
    );
});