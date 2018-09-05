/*REGISTERING SW*/
if (!'serviceWorker' in navigator) {
  throw new Error('This browser doesn\'t support serviceWorker() function, please use a modern browsers.')
} else {
  window.addEventListener('load', function() {
    navigator.serviceWorker.register('./service-worker.js').then(function(register) {
      console.log('ServiceWorker registration successful with scope: ', register.scope)
    }, function(err) {
      console.log('ServiceWorker registration failed: ', err)
    })
  })
}
 
 fetch('https://my-json-server.typicode.com/burnthesymphony/MyPWA/news').then(data=>data.json().then(
        function(JSONData){
          console.log(JSONData);
              displayPage(JSONData,'network')
         
        }
    )).catch(function(error){
             caches.match('home.json').then(data=>data.json().then(function(data){
                displayPage(data,'caches');
              })).catch(function(){  console.log('NODATA DISPLAY')})

    })


function displayPage(data,src) {

 $.each(data,function(key,value){
    _html='<b>FROM '+src+'</b><br><h1>'+value.title+'</h1><h2>'+value.channel+'</h2><p>'+value.content+'</p>';
    $('.main').append(_html);
   

  })
}
