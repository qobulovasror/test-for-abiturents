 //xush kelibsiz textti
 const xushText = document.getElementById('xushText');
 const text1 = 'xush kelibsiz !';
 let idx1 = 1;
 let bool1 = false;
 writeText();
 function writeText(){
     if(bool1 == false){
         xushText.innerText = text1.slice(0,idx1);
         idx1++;
         if(idx1 > text1.length){
             bool1 = true;
         }
     }else{
         xushText.innerText = text1.slice(0,idx1);
         idx1--;
         if(idx1 == 0){
             bool1 = false;
         }
     }
     
     setTimeout(writeText,250);
 }

// animation
let anim = document.querySelector('#anim');
setTimeout(function(){
    anim.style.animation = "none";
    anim.classList.add("box1AnimNone");
},6900);
setTimeout(function(){
    anim.style.display = "none";
},10000);

// select categoris
let categor = document.getElementById('categor');
let secectMenu = document.getElementById('secectMenu');
function select(element){
    for(let key of secectMenu.children){
        if(key.classList[1] == 'active' || key.classList[2] == 'active'){
            key.classList.remove('active');
            break;
        }
    }
    element.classList.add('active');
    for(let key of categor.children){
        if(key.classList[1] == element.classList[0]){
            key.style.display = "block";
        }else{
            key.style.display = "none";
        }
    }
    for(let key of categor.children){
        if(element.classList[0] == 'all'){
            key.style.display = "block";
        }
    }
}


// Menu for responsive
let rightMenu = document.querySelector('#rightMenu');
function menu(){
    rightMenu.classList.add('rightMenuActive');
    rightMenu.classList.remove('rightMenuNoActive');
}
function menuClose(){
    rightMenu.classList.add('rightMenuNoActive');
    rightMenu.classList.remove('rightMenuActive');
}