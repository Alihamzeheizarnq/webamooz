let $ = document;
let myVar = setInterval(myTimer , 1000);

function myTimer(){
    let date = new Date();
    let timeShow = $.getElementById('timer');
    let dateShow = $.getElementById('date');

    timeShow.innerHTML = date.toLocaleTimeString();
    dateShow.innerHTML = date.toLocaleDateString();
}

let themes = $.getElementsByClassName('theme');
let showStatus = true;

function themeDisplay(){
    if(!showStatus){
        for(let i in [1,2,3]){
            themes[i].style.display = 'block';
        }
        showStatus = true;
    }else{
        for(var i in [1,2,3]){
            themes[i].style.display = 'none';
        }
        showStatus = false;
    }
}

function darkTheme(){
    for(let i=0 ; i <=9 ; i++){
        $.getElementsByClassName('page-options-items')[0].children[0].children[i].children[0].style.color = 'white';
    }
    $.getElementById('navigation').style.background = 'black';
    $.getElementsByClassName('timer')[0].children[0].style.color = "white";
    $.getElementsByClassName('timer')[0].children[1].style.color = "white";
    $.getElementById('section-1').style.background = 'linear-gradient(45deg, black, #fff)';
    $.getElementsByClassName('login')[0].style.background = 'linear-gradient(45deg, black, gray)';
    $.getElementsByClassName('sign-up')[0].style.background = 'linear-gradient(45deg, black, gray)';
    $.getElementById('bookOrderText').style.color = '#000';

}

function lightTheme(){
    $.getElementById('bookOrderText').style.color = '#e23d9d';
    $.getElementById('navigation').style.background = '#e23d9d';
    $.getElementsByClassName('login')[0].style.background = 'linear-gradient(45deg, #e23d9d, purple)';
    $.getElementsByClassName('sign-up')[0].style.background = 'linear-gradient(45deg, #e23d9d, purple)';
    $.getElementById('section-1').style.background = 'linear-gradient(45deg, #e23d9d, purple)';
}

function defaultTheme(){
    for(let i=0 ; i <=9 ; i++){
        $.getElementsByClassName('page-options-items')[0].children[0].children[i].children[0].style.color = '#000';
    }
    $.getElementById('navigation').style.background = '#fff';
    $.getElementsByClassName('timer')[0].children[0].style.color = "#000";
    $.getElementsByClassName('timer')[0].children[1].style.color = "#000";
    $.getElementById('section-1').style.background = 'linear-gradient(45deg, rgb(35, 140, 238, 0.9),rgb(25, 232, 49, 0.9))';
    $.getElementsByClassName('login')[0].style.background = 'linear-gradient(#2b4163, #000, #2b4163)';
    $.getElementsByClassName('sign-up')[0].style.background = 'linear-gradient(#2b4163, #000, #2b4163)';
    $.getElementById('bookOrderText').style.color = '#2b4163';
}

let currentIndex = 0;
let images = document.getElementsByClassName("img");
let dots = document.getElementsByClassName("dot");

let slider = (imgInedx) => {
    currentIndex = imgInedx;
    if(currentIndex > images.length-1){
        currentIndex = 0;
    }
    if(currentIndex < 0){
        currentIndex = images.length-1;
    }
    for(let i=0 ; i<4 ; i++){
        images[i].style.display = 'none';
        dots[i].classList = 'dot'; 
    }
    i=0;
    images[currentIndex].style.display = 'block';
    dots[currentIndex].classList.add('active');
    imgInedx++;
}
let j=0;
setInterval(() => {
    slider(j);
    j++;
    if(j == 5){
        j=0;
    }
}, 8000);