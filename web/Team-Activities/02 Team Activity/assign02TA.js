function displaClicked(){
    alert("Clicked")
}

function changeColor(){
     var tempColor = document.getElementById("color").value;
    // document.getElementById("first").style.backgroundColor = tempColor;

    $("div#first").css({"background-color": tempColor});

}

function changeFade(){

}