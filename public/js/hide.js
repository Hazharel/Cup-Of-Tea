let dateY = new Date();
let dateM = new Date();
let year = dateY.getFullYear()+1;
let month = dateM.getMonth()+1;
dateY.setYear(year);
dateM.setMonth(month)
console.log(month);
console.log(dateY);
console.log(dateM);

let username = "Iencli";

let oui = document.getElementById('oui');
let non = document.getElementById('non');
let cookie = document.querySelector(".cookie");

function hideCookie(){
    cookie.classList.remove("cookie"); 
    cookie.classList.add("cookieHide");
    console.log("test");
    if(this.id=="oui"){
        document.cookie= `username=${username}; expires=${dateY}; path=/developpement/CupOfTea`;
        console.log(year);
    }
    else if(this.id=="non"){
        document.cookie= `username=Iencli; expires=${dateM}; path=/developpement/CupOfTea` ;
        console.log(month);
    }    
}

    oui.addEventListener("click", hideCookie);
    non.addEventListener("click",hideCookie);


