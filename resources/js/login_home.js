const array = ["/images/sample1.jpeg", "/images/sample2.jpeg", "/images/sample3.jpeg", "/images/sample4.jpeg"];
let num = 0;
console.log(num);
document.getElementById("back_button").onclick = function() {
    if (num == 0) {
        num = 2;
    }
    else {
        num --;
    }
    document.getElementById("image").src=array[num];
}
      
document.getElementById("forward_button").onclick = function() {
    if (num == 3) {
        num = 0;
    }
    else {
        num ++;
    }
    document.getElementById("image").src=array[num];
}
