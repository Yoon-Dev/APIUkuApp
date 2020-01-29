var CACHE_NAME = 'cache';
var urlsToCache = [
  '../favicon/apple-touch-icon.png',
  '../favicon/favicon-32x32.png',
  '../favicon/favicon-16x16.png',
  '../favicon/site.webmanifest',
  '../favicon/safari-pinned-tab.svg',
  'https://use.fontawesome.com/releases/v5.0.8/js/all.js',
  '../bootstrap/css/bootstrap.min.css',
  '../css/style.css',
  '../css/add.css',
  '../js/script.js',
  './index.php',
  './add.php',
  './update.php',
  './data/getBdd.php',
  './data/getSingle.php',
  '../icon/add-btn-uku.png',
  '../icon/back-btn-uku.png',
  '../src/add.php',
  '../src/delete.php',
  '../src/update.php',
  '../utils/init.php'
];

self.addEventListener('install', function(event) {
  // Perform install steps
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function(cache) {
        return cache.addAll(urlsToCache);
      })
  );
  self.skipWaiting()
});

self.addEventListener('activate', function(evt){
  evt.waitUntil(
    caches.keys().then((keyList) => {
      return Promise.all(keyList.map((key) => {
        if (key !== CACHE_NAME) {
          // remove old cache
          return caches.delete(key);
        }
      }));
    })
  );
  self.clients.claim()
});

self.addEventListener('fetch', (evt) =>{
  // CODELAB: Add fetch event handler here.
  if (evt.request.mode !== 'navigate') {
    // Not a page navigation, bail.
    return;
  }
  evt.respondWith(
      fetch(evt.request)
          .catch(() => {
            return caches.open(CACHE_NAME)
                .then((cache) => {
                  return cache.match('./offline.php');
                });
          })
  );
});