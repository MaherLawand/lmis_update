function change(){
        let learn= document.getElementById('learning');
        let qualification=document.getElementById('Qualification');
        learn.addEventListener('change',()=>{
                 for(let i=0;i<learn.options.length;i++){
                        if(learn.value==qualification.options[i].value){
                                qualification.options[i].removeAttribute('hidden');
                        }else{
                                qualification.options[i].setAttribute('hidden',"");
                        }
                 }

                    });     
            }   