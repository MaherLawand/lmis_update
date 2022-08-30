function elective(){
        let elec_head=document.getElementById('elective-heading');
        let elec_table=document.getElementById('elective-table');
                if (elec_head.hidden) {
                        elec_head.removeAttribute("hidden");
                        elec_table.removeAttribute("hidden");
                      } else {
                        elec_head.setAttribute("hidden","");
                        elec_table.setAttribute("hidden","");
                      }
     
}
function change(){
        let learn= document.getElementById('learning');
        let qualification=document.getElementById('Qualification');
        
                 for(let i=0;i<learn.options.length;i++){
                        if(learn.value==qualification.options[i].value){
                                qualification.options[i].removeAttribute('hidden');
                        }else{
                                qualification.options[i].setAttribute('hidden',"");
                        }
                 }

                    
            }
            function electives(){
                let qualification=document.getElementById('Qualification');
                let electives=document.getElementsByClassName('elective');
                let elective_row=document.getElementsByClassName('elective_row');
                for(let i=0;i<electives.length;i++){
                        if(qualification.value==electives[i].value){
                                elective_row[i].removeAttribute('hidden');
                        }else{
                                elective_row[i].setAttribute('hidden',"")
                        }   
                
        }
            }
            function changestandard(){
                let unit= document.getElementById('unit_standard');
                let qualification=document.getElementById('Qualification_standard');
                
                         for(let i=0;i<qualification.options.length;i++){
                                if(unit.value==qualification.options[i].value){
                                        qualification.options[i].removeAttribute('hidden');
                                }else{
                                        qualification.options[i].setAttribute('hidden',"");
                                }
                         }
        
                            
                    }     
                    function getusqualid(){
                        let qualification=document.getElementById('Qualification_standard');
                        let usqualhidden=document.getElementById('usqualhidden');
                        for(let i=0;i<qualification.options.length;i++){
                                if(qualification.options[i].selected){
                                        usqualhidden.value=i;
                                }
                        }
                    }
                    function deleteelective(){
                        let deletebtn=document.getElementById('deletebtn');
                        let qualification=document.getElementById('Qualification');
                        for(let i=0;i<qualification.options.length;i++){
                                if(qualification.options[i].selected){
                                        deletebtn.value=i;
                                }
                        }
                }
                    function getelectiveid(){
                        let elective=document.getElementsByClassName('elective');
                        let electives=document.getElementsByClassName('electives');
                        for(let i=0;i<elective.length;i++){
                                if(elective[i].checked){
                                        electives[i].setAttribute("checked","checked");
                                }else{
                                        electives[i].removeAttribute("checked");
                                }
                        }
                    }
                    function hide(){
                        let qual_btn=document.getElementById('qualification-btn');
                        let unit_btn=document.getElementById('unit-btn');
                        if(qual_btn.checked){
                                let unit= document.getElementById('unit_standard');
                                let qualification_standard=document.getElementById('Qualification_standard');
                                let qual_lbl=document.getElementById('qualification-label');
                                let learn_lbl=document.getElementById('learning-label');
                                let unit_lbl=document.getElementById('unit-label');
                                let qual_unit_lbl=document.getElementById('qual-label');
                                let elective=document.getElementById('elective-btn');
                                unit.setAttribute('hidden',"");
                                qualification_standard.setAttribute('hidden',"");
                                unit_lbl.setAttribute('hidden',"");
                                qual_unit_lbl.setAttribute('hidden',"");
                                let learn= document.getElementById('learning');
                                let qualification=document.getElementById('Qualification');
                                learn.removeAttribute('hidden');
                                qualification.removeAttribute('hidden');
                                qual_lbl.removeAttribute('hidden');
                                learn_lbl.removeAttribute('hidden');
                                elective.removeAttribute('hidden');
                        }
                        if(unit_btn.checked){
                                let learn= document.getElementById('learning');
                                let qualification=document.getElementById('Qualification');
                                let qual_lbl=document.getElementById('qualification-label');
                                let learn_lbl=document.getElementById('learning-label');
                                let unit_lbl=document.getElementById('unit-label');
                                let qual_unit_lbl=document.getElementById('qual-label');
                                let elective=document.getElementById('elective-btn');
                                elective.setAttribute('hidden',"");
                                learn.setAttribute('hidden',"");
                                qualification.setAttribute('hidden',"");
                                learn_lbl.setAttribute('hidden',"");
                                qual_lbl.setAttribute('hidden',"");
                                let unit= document.getElementById('unit_standard');
                                let qualification_standard=document.getElementById('Qualification_standard');
                                unit.removeAttribute('hidden');
                                qualification_standard.removeAttribute('hidden');
                                unit_lbl.removeAttribute('hidden');
                                qual_unit_lbl.removeAttribute('hidden');
                        }
                    }
                    

