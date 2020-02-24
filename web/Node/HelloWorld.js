var http = require('http');
var url = require('url');
var fs = require('fs');


var server = http.createServer(onRequest);
server.listen(8888);



function onRequest(request, response){
    
    var q = url.parse(request.url, true);

    var path = q.pathname;

    if(path == '/hime'){
        response.write("<h1>Hello World!!!!</h1>");
    }else if(path == '/getData'){

        response.write('{"name":"Br. Burton","class":"cs313"}');
    }else{
        response.write("404 Page not FOUND!");
    }
   
    response.end();
}

