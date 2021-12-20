// Rehistrantion Page anti Error code

// target input's 
let name1 = document.getElementById('name'),
    email = document.getElementById('email'),
    selUser = document.getElementById('selUser'),
    login = document.getElementById('login'),
    parol = document.getElementById('parol'),
    reparol = document.getElementById('reparol');

// target alert
let alert1 = document.getElementById('alert');

// Submit function
let btnRegis = document.getElementById('regis');
btnRegis.addEventListener('click',function(e){
    // select User
    if(selUser.value == "none"){
        e.preventDefault();
        alert1.innerHTML = "Birinchi maydonga qiymat kiritilmagan";
        alertBlock(selUser);  
    }

    // name
    if( name1.value == "" || name1.value.length < 4){
        e.preventDefault();
        alert1.innerHTML = "Familiya va Ism kiritilmagan";
        alertBlock(name1); 
    }

    // email
    emailTest =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/ ;
    if( ! emailTest.test(email.value) ){
        e.preventDefault();
        alert1.innerHTML = "Email xato";
        alertBlock(email); 
    }

    // login
    if( login.value =="" || login.value.length < 4 || login.value[0]== Number){
        e.preventDefault();
        alert1.innerHTML = "Login  xato";
        alertBlock(login); 
    }
    
    // parol
    if(parol.value =="" || parol.value.length < 4 || reparol.value =="" || reparol.value.length < 4){
        e.preventDefault();
        alert1.innerHTML = "Parol  xato";
        alertBlock(parol);
        alertBlock(reparol);
    }else{
        if(parol.value !== reparol.value){
            e.preventDefault();
            alert1.innerHTML = "Birinchi va ikkinchi parollar mos emas";
            alertBlock(parol);
            alertBlock(reparol);
        }
    }
    
})

// Alert window 
function alertBlock(element) {
    element.style.border = "2px solid red";
    alert1.style.display = "block"; 
    setTimeout(() => {
        alert1.style.display = "none";
    }, 4000);
}
alert1.addEventListener('click',function() {
    this.style.display = "none";
})

let connect=document.getElementById('connect');
// Alert window 2
if(connect.style.display == "block"){
    setTimeout(() => {
        connect.style.display = "none";
    }, 4000);
}
connect.addEventListener('click',function() {
    connect.style.display = "none";
})

// input validation errors
name1.addEventListener('keyup',function(e) {
    if(e.target.value.length < 4){
        e.target.style.border = "2px solid red";
    }else{
        if(e.target.value.length < 6){
            e.target.style.border = "2px solid yellow";
        }else{
            e.target.style.border = "2px solid green";
        }
    }
})
login.addEventListener('keyup',function(e) {
    if(e.target.value.length < 4){
        e.target.style.border = "2px solid red";
    }else{
        if(e.target.value.length < 6){
            e.target.style.border = "2px solid yellow";
        }else{
            e.target.style.border = "2px solid green";
        }    }
})
parol.addEventListener('keyup',function(e) {
    if(e.target.value.length < 4){
        e.target.style.border = "2px solid red";
    }else{
        if(e.target.value.length < 6){
            e.target.style.border = "2px solid yellow";
        }else e.target.style.border = "2px solid green"; 
    }
})
reparol.addEventListener('keyup',function(e) {
    if(e.target.value !== parol.value){
        e.target.style.border = "2px solid red";
    }else{
        e.target.style.border = "2px solid green";
    }
})
