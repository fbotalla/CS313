const fs = require('fs');

var fileText = process.argv[2];

fs.readFile(fileText, function callbFunction(err, data){
    if(err){
       return console.log(err);
    }
    else{
       data = data.toString().split('\n').length-1;
        return console.log(data);
    }
});
//console.log(result);


