var http = require('http');
var url = require('url');
var fs = require('fs');

var json_Obj;
var json;

var server = http.createServer(onRequest);
server.listen(8000);



function onRequest(request, response){
    
    var q = url.parse(request.url, true);

    var path = q.pathname;

    if(path == '/home'){
        response.writeHead(200, { 'Content-Type': 'text/html' });
        response.write("<h1>Hello World!!!!</h1>");
    
    }else if(path == '/getData'){
        json_Obj = fs.readFileSync("json.json");
        json = JSON.parse(json_Obj);
        response.writeHead(200, { 'Content-Type': 'application/json' });
        response.write("My Name: " + json.name + "\n");
        response.write("My Class: " + json.class + "\n");
    }else if(path == '/beyond'){
        response.writeHead(301,
            {Location: 'http://google.com'}
          );
    }
    
    else{
        response.writeHead(404, { "Content-Type": "text/html" });
        response.write('404: Page Not Found');
       
    }
   
    response.end();
}

