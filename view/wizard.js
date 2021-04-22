 let btnNext= document.querySelector('.buttonNext');
 let input= document.getElementById('id');

 input.addEventListener('keyup',(){ if(input.value.length > 0){btnNext.disabled = false;}else{btnNext.disabled = true;} ;