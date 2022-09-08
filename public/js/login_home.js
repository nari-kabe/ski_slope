const array = ["/images/sample1.jpeg", "/images/sample2.jpeg", "/images/sample3.jpeg", "/images/sample4.jpeg"];
                const array2 = ["'radius1'", "'radius2'", "'radius3'", "'radius4'"];
                let num = 0;
                const elements = document.getElementsByName('radio_button');
                
                /*画像 横ボタン*/
                function go_back(){
                    elements[num].checked = false;
                    
                　　if (num == 0) {
                        num = 3;
                    }
                    else {
                        num --;
                    }
                    document.getElementById("image").src=array[num];
                    elements[num].checked = true;
            　　}
                
                function go_forward(){
                    elements[num].checked = false;
                    if (num == 3) {
                        num = 0;
                    }
                    else {
                        num ++;
                    }
                    document.getElementById("image").src=array[num];
                    elements[num].checked = true;
                }
                
                /*画像 下の丸ボタン*/
                function radius1(){
                    num=0;
                    document.getElementById("image").src=array[0];
                }
                function radius2(){
                    num=1;
                    document.getElementById("image").src=array[1];
                }
                function radius3(){
                    num=2;
                    document.getElementById("image").src=array[2];
                }
                function radius4(){
                    num=3;
                    document.getElementById("image").src=array[3];
                }