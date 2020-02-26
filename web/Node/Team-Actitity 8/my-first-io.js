const fs = require('fs');

var fileText = process.argv[2];

var result = fs.readFileSync(fileText);

const str = result.toString().split('\n').length-1;

console.log(str);