window.onload = function(){
    start();
}

let maincontent;
let button;
let r;
let g;
let b;


function start(){
    maincontent = document.querySelector('#maincontent'); //document.getElementById('second');
    button = document.querySelector('#changeColor');
    button.addEventListener('click', changeColor);
    maincontent.addEventListener('mouseover', changeColor);
    window.addEventListener('keypress', changeColor);

}

function generateColor(){
    r = Math.round(Math.random()*255);
    g = Math.round(Math.random()*255);
    b = Math.round(Math.random()*255);
}

function changeColor(){
    
    generateColor();
    maincontent.style.backgroundColor = 'rgb('+ r +','+ g + ',' + b +')';
    
}