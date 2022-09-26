function textarea_off(e){
    document.getElementById(e).style="display: none";
    // document.getElementById(e).name="";
    document.getElementById(e).value="";
    console.log(document.getElementById(e).value);
}
                
function textarea_on(e){
    document.getElementById(e).style="display: block";
}

function textarea_display(e){
    let number = 1;
    if(number == 0){
        // document.getElementById(available_textarea).style="display: block";
        document.getElementById(e).style="display: none";
        number=1;
    } else{
        // document.getElementById(available_textarea).style="display: none";
        document.getElementById(e).style="display: block";
        number=0;
    }
}
