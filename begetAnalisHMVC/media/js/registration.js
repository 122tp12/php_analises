function func(){
    var p1=document.getElementById("password");
    var p2=document.getElementById("rPassword");
    var mas=document.getElementById("mesage");
    if(p1.value==p2.value){

        mas.innerText="Паролі співпадають";
        mas.style.color="green";
    }
    else{
        mas.innerText="Паролі не співпадають";
        mas.style.color="red";
    }
}