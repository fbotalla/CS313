const fs = require('fs');
const path = require('path');

var ext = '.' + process.argv[3];
var name = process.argv[2];

module.exports = function (name,ext,callback) {  
fs.readdir(name,function (err,data) {
    if(err){
        return callback(err);
    }
    else{
        data = data.filter(function (d) {
            return path.extname(d) === ext;
        })
        callback(null,data);
    }
});
}

// function callback(err,lists){
//     if(err){
//                 return callback(err);
//             }
//             lists.forEach(function (list){
//                 if(path.extname(list) === ext){
//                     console.log(list);
//                 }
//             })
//         }






// fs.readdir(name, function (err, lists){
//     if(err){
//         return err;
//     }
//     lists.forEach(function (list){
//         if(path.extname(list) === ext){
//             console.log(list);
//         }
//     })

// })