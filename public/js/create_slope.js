function textarea_off(e){
    document.getElementById(e).style="display: none";
}
                
function textarea_on(e){
    document.getElementById(e).style="display: block";
}

let number = 1;
function textarea_display(e){
    //check1 = document.form1.Checkbox1.checked;
    // let element = document.available3.checked;
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


window.addEventListener('DOMContentLoaded', function(){

	// チェックボックスのHTML要素を取得
	let input_agree = document.querySelector("input[name=agree]");

	input_agree.addEventListener('change',function(){
		console.log(this.checked); // 選択されたらtrue、選択解除はfalse
	});
});
