let upr_next=document.getElementById("upper-next");
let hidden=document.getElementById("hidden");
upr_next.addEventListener('click',()=>{
        if(hidden.value==1){
                window.location.href = "QMS.php";
            }else if(hidden.value==2){
                window.location.href = "programmescope.php";
            }
            else if(hidden.value==3){
                window.location.href = "ETDstaff.php";
            }
    }
    );
