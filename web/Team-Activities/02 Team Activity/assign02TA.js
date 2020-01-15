function displaClicked(){
    alert("Clicked")
}

function changeColor(){
     var tempColor = $("#color").val();
     $("div#first").css({"background-color": tempColor});

}

function changeFade(){  
   $("div#third").fadeToggle(3000);
   
}