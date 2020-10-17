"use strict";
document.addEventListener('DOMContentLoader',function(){
    let form=document.getElementById("emailform");
    form.addEventListener("submit",formsend);
    async function formsend(e){
        e.preventDefault();

        let formData=new FormData(form);
        form.classList.add('_sending');
        let response=await fetch('sendmail.php',{
            method:'POST',
            body:formData
        });
        if(response.ok){
            let result=await response.json();
            alert(result.message);
            formPreview.innerHTML='';
            form.reset();
            form.classList.remove('_sending');
        }
        else{
            alert("Somethig went wrong");
            form.classList.remove('_sending');
        }
    }
});