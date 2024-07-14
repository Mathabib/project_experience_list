const type = document.getElementsByClassName('type');


// fungi print ke pdf
function printPage(){
    window.print();
}

type_aray = [...type];


type_aray.forEach(function(tipe){
    const category = tipe.textContent || tipe.innerText;
    if(category === 'study'){
        tipe.style.backgroundColor = 'rgb(255, 176, 0)';
        tipe.textContent = '';
    } else if(category === 'implementation') {
        tipe.style.backgroundColor = 'rgb(56, 229, 77)';
        tipe.textContent = '';
    } else if(category === 'study & implementation'){
        tipe.style.backgroundColor = 'rgb(64, 248, 255)';
        tipe.textContent = '';
    }
    
});





// rgb(56, 229, 77) hijau,  rgb(64, 248, 255) biru