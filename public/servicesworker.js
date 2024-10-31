const CACHE_NAME = 'perpus_poliwangi';


let resourcestoCACHE = [
    '/offline',
    '/bootstrap/js/bootstrap.min.js',
    '/bootstrap/css/bootstrap.min.css',
    '/images/icons/72x72.png',
    '/images/icons/96x96.png',
    '/images/icons/128x128.png',
    '/images/icons/144x144.png',
    '/images/icons/152x152.png',
    '/images/icons/192x192.png',
    '/images/icons/384x384.png',
    '/images/icons/512x512.png',
];

self.addEventListener("install", e => {
    e.waitUntil(
        caches.open(CACHE_NAME).then(cache => {
            return cache.addAll(resourcestoCACHE);
        }).then(self.skipWaiting())
    );
});

self.addEventListener('fetch', function (event) {
    event.respondWith(
        fetch(event.request)
        .catch(() => {
            return caches.open(CACHE_NAME)
            .then((cache) =>{
                return cache.match(event.request)
            })
        })
    )
})

const cacheWhitelist = [CACHE_NAME];
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.map(cacheName => {
                    if (cacheWhitelist.indexOf(cacheName) === -1) {
                        return caches.delete(cacheName);
                    }
                })
            );
        }).then(() => self.clients.claim())
    );
});