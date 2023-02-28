background = document.getElementById('background-modal');
modals = document.getElementsByClassName('modal');
boutonsupprimer = document.getElementsByClassName('supprimer');
boutonnon = document.getElementsByClassName('non');

for(let i = 0; i < boutonsupprimer.length ; i++ ){
    boutonsupprimer[i].addEventListener('click' , event =>{
        modals[i].style.display = 'block';
        background.style.display ='block';
    });
}

background.addEventListener('click' , event =>{
    for(let i = 0; i < modals.length ; i++ ){
        modals[i].style.display = 'none';
    }
    background.style.display = ''
});

for(let i = 0; i < boutonnon.length ; i++ ){
    boutonnon[i].addEventListener('click' , event =>{
        modals[i].style.display = 'none';
        background.style.display ='none';
    });
}
   