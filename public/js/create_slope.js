function textarea_off(e){
    document.getElementById(e).style="display: none";
    document.getElementById(e).value="";
}
                
function textarea_on(e){
    document.getElementById(e).style="display: block";
    document.getElementById(e).focus();
}

function textarea_display(e){
    let number = 1;
    if(number == 0){
        document.getElementById(e).style="display: none";
        number=1;
        
    } else{
        document.getElementById(e).style="display: block";
        number=0;
    }
}
