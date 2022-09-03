var home_images = new Array("/images/sample1.jpeg", "/images/sample2.jpeg", "/images/sample3.jpeg", "/images/sample4.jpeg)";
    var num = 0;
document.getElementById("forward_button").onclick = function() {
//   function go_forward(){
    if (num == 2) {
        num = 0;
    }
    else {
        num ++;
    }
    document.getElementById("image").src=home_images[num];

}
