/*REGISTERING SW*/
if ('serviceWorker' in navigator) {
    navigator.serviceWorker
             .register('service-worker.js')
             .then(function() { console.log('Service Worker Registered'); }).catch(function(error){console.log(error)});
  }
 
 
 fetch('https://my-json-server.typicode.com/burnthesymphony/MyPWA/news').then(data=>data.json().then(
        function(JSONData){
          console.log(JSONData);
              displayPage(JSONData,'network');
         
        }
    )).catch(function(error){
             caches.match('home-data').then(data=>data.json().then(function(data){
                displayPage(data,'caches');
              })).catch(function(error){  console.log(error)})

    })


function displayPage(data,src) {

 $.each(data,function(key,value){
    _html='<b>FROM '+src+'</b><br><h1>'+value.title+'</h1><h2>'+value.channel+'</h2><p>'+value.content+'</p>';
    $('.main').append(_html);
   

  })
}
