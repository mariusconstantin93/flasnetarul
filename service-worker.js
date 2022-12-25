const cacheName = 'cache-v1';
const precacheResources = [
  '/',
  '/assets/',
  '/assets/images/',
  '/config.php',
  '/images/bancuri.png',
  '/images/icon-128x128.png',
  '/images/icon-192x192.png',
  '/images/icon-256x256.png',
  '/images/icon-384x384.png',
  '/images/icon-512x512.png',
  '/images/politica.png',
  '/images/social.png',
  '/images/stiinta.png'
];

self.addEventListener('install', event => {
  console.log('Service worker install event!');
  event.waitUntil(
    caches.open(cacheName)
      .then(cache => {
        return cache.addAll(precacheResources);
      })
  );
});

self.addEventListener('activate', event => {
  console.log('Service worker activate event!');
});

self.addEventListener('fetch', event => {
  console.log('Fetch intercepted for:', event.request.url);
  event.respondWith(caches.match(event.request)
    .then(cachedResponse => {
        if (cachedResponse) {
          return cachedResponse;
        }
        return fetch(event.request);
      })
    );
});
