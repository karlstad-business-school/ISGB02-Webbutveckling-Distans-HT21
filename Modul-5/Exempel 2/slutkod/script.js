'use strict';
window.addEventListener('load', prepareColorPicker);

function prepareColorPicker() {
    var fields = document.querySelectorAll('.field');

    for(var i=0; i<fields.length;i++) {
        var input = fields[i].querySelector('input');
        var span = fields[i].querySelector('.value');
        input.value = Math.floor(Math.random()*256);
        span.textContent = input.value;
        input.addEventListener('input', handleValueChange);
    }
    upadateBackGround();
}

function handleValueChange() {

    upadateBackGround();

}

function upadateBackGround() {
    
    var red = document.querySelector('#red').value;
    var green = document.querySelector('#green').value;
    var blue = document.querySelector('#blue').value;

    var newColor = 'rgb(' + red + ',' + green + ',' + blue + ')';
    document.querySelector('body').style.backgroundColor = newColor;
}