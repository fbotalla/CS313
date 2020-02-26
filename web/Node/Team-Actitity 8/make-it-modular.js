
const mymodule = require('./mymodule.js')

const filepath = process.argv[2];
const ext = process.argv[3];

mymodule(filepath,ext,function (err, data) {
    if(err){
        return console.log(err);
    }
    else{
        data.forEach (function(d){
            console.log(d);
        })
    }
})