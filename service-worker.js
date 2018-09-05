var cacheName = 'ROL-x-09';
var filesToCache = [
  '/',
  '/index.html',
  'assets/jquery.min.js',
  'assets/app.js',
  'assets/logo.png',
  
];
/*var DFilesToCache = [

  '/data/home.json',  
];*/
self.addEventListener('install', function(e) {
  console.log('[ServiceWorker] Install');

  e.waitUntil(
    caches.open(cacheName).then(function(cache) {
       return cache.addAll(filesToCache);  
     
      
    })
  );
});


self.addEventListener('activate', function(event) {

   /*BIKIN CACHE DINAMIS 
  */
  caches.open('blog-post-cache').then(function(dcache){
    fetch('https://my-json-server.typicode.com/burnthesymphony/MyPWA/news').then(data=>data.json().then(
        function(JSONData){
              //dcache.delete('/home.json').then(
              dcache.put('/home.json', new Response(JSON.stringify(JSONData)))

         // )
         
        }
    )).catch(function(error){
      console.log('CANNOT CONNECT TO NETWORKS')

    })
   
  }).catch(function(error_){
    console.log(error_);
  })

});

self.addEventListener('fetch', function(event) {
  event.respondWith(
    
    caches.match(event.request)
      .then(function(response) {
        if (response) {
          return response;
        }
        return fetch(event.request);
      }
    )
  );
});


