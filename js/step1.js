let upr_next=document.getElementById("upper-next");
let btm_next=document.getElementById("bottom-next");
let edit=document.querySelectorAll("#edit");




window.onload= function checkreadonly(){
    let inputs=document.querySelectorAll("input");
    let selects=document.querySelectorAll("select");
for(let i=0;i<inputs.length;i++){
if(inputs[i].readOnly){
    inputs[i].style.border="0px";
    inputs[i].style.outline="0px";
}
}
for(let x=0;x<selects.length;x++){
    if(selects[x].disabled){
        selects[x].style.border="0px";
        selects[x].style.outline="0px";
    }
    }
}

edit[0].addEventListener('click',()=>{
    let inputs=document.querySelectorAll("input");
    let selects=document.querySelectorAll("select");
    console.log(selects);
    for(let i=0;i<inputs.length;i++){
        inputs[i].removeAttribute('readonly');
        inputs[i].style.border="1px solid #00c16e";
        }
        for(let x=0;x<selects.length;x++){
            selects[x].removeAttribute('disabled');
            selects[x].style.border="1px solid #00c16e";
        }
})
edit[1].addEventListener('click',()=>{
    let inputs=document.querySelectorAll("input");
    let selects=document.querySelectorAll("select");
    console.log(inputs);
    for(let i=0;i<inputs.length;i++){
        if(inputs[i].className!=="submit"){
        inputs[i].removeAttribute('readonly');
        inputs[i].style.border="1px solid #00c16e";
        }
        }
        for(let x=0;x<selects.length;x++){
            selects[x].removeAttribute('disabled');
            selects[x].style.border="1px solid #00c16e";
        }
})



function savebtn(){
let save=document.getElementById("submit");
let count=document.getElementsByClassName("count");
var counter=0;
for(let i=0;i<count.length;i++){
    if(count[i].value==""){
        counter++;
    }
}
if(counter>0){

}else{
    save.removeAttribute("disabled");
    save.style.backgroundColor="#00c16e";
    save.style.color="white";
}

}


upr_next.addEventListener('click',()=>{
let count=document.getElementsByClassName("count");
let latsec=document.getElementById("Latitude-sec").value;
let longsec=document.getElementById("Longitude-sec").value;
let counter=0;
for(let i=0;i<count.length;i++){
    if(count[i].value==""){
        counter++;
        console.log(counter);
    }
}
if(counter>0 || longsec>59 || latsec>59){
    console.log("missing");
}else{
    console.log("worked");
}
});

btm_next.addEventListener('click',()=>{
    let count=document.getElementsByClassName("count");
    let latsec=document.getElementById("Latitude-sec").value;
    let longsec=document.getElementById("Longitude-sec").value;
    let counter=0;
    for(let i=0;i<count.length;i++){
        if(count[i].value==""){
            counter++;
            console.log(counter);
        }
    }
    if(counter>0 || longsec>59 || latsec>59){
        console.log("missing");
    }else{
        console.log("worked");
    }
    });
 

 



function checklatsec(){
let latsec=document.getElementById("Latitude-sec").value;
let error=document.getElementById("seconds-one");
let latsecstyle=document.getElementById("Latitude-sec");
if(latsec>59){
    error.innerText="* Must be <60";
    latsecstyle.classList.add("empty");
}else{
    error.innerText="";
    latsecstyle.classList.remove("empty");
}
}
function checklongsec(){
    let longsec=document.getElementById("Longitude-sec").value;
    let error=document.getElementById("seconds-two");
    let longsecstyle=document.getElementById("Longitude-sec");
    if(longsec>59){
        error.innerText="* Must be <60";
        longsecstyle.classList.add("empty");
    ;}else{
        error.innerText="";
        longsecstyle.classList.remove("empty");
    }
    ;}
function checkempty(x){
    let input=document.getElementById(x);
    if(input.value==""){
        input.classList.add("empty");
        input.placeholder="This Field is required!";
    }else{
        input.classList.remove("empty");
    }
}


