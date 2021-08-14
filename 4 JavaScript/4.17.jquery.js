$.ajax( 
 {
 'method' : 'GET', 
 'url' : '/countries.json', 
 'dataType' : 'json', 
 'success' : function( jsonContents ) 
 { console.log( jsonContents ); },
 'error' : function( jqXHR, textStatus, errorThrown )
 {
    console.error( textStatus );
 },
}
);