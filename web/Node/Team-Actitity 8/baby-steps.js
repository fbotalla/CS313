    var something = 0;
    //console.log(Number(process.argv));
    
    for(i = 2; i< process.argv.length; i++){
      something += Number(process.argv[i]);
     
    }
    console.log(something);
