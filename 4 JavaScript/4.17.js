let xhr = new XMLHttpRequest();
xhr.open( 'GET', '/countries.json');
xhr.responseType = 'json';
xhr.send();
xhr.onload = function() {
    if( xhr.status == 200 ) 
    {
    console.log( xhr.response );}
    else {
        console.error( 'Сталася помилка ' +
        xhr.status + ': ' + xhr.statusText );
        }
       };
       xhr.onerror = function() {
        console.error( 'Сталася помилка при виконанні запита до сервера' );
       };
       