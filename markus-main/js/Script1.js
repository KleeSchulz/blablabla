const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navbarLinks = document.getElementsByClassName('navbar-links')[0]


toggleButton.addEventListener('click', () => {
    navbarLinks.classList.toggle('active')    
})
navbarLinks.addEventListener('click', () => {
    navbarLinks.classList.remove('active')
})


function pkw(number) {
    var x = document.getElementsByClassName('showB');
    var y = document.getElementsByClassName('B');
    var z = document.getElementsByClassName('BR');
    for (i = 0; i < x.length; i++) {
        if (i == number && x[number].style.display != 'grid') {
            x[number].style.display = 'grid';
            y[number].style.filter = 'invert(57%) sepia(77%) saturate(1569%) hue-rotate(345deg) brightness(98%) contrast(96%)';
            y[number].style.webkitFilter = 'invert(57%) sepia(77%) saturate(1569%) hue-rotate(345deg) brightness(98%) contrast(96%)';                                              
        } else {
            x[i].style.display = 'none';               
            y[i].style.filter = 'none';
            y[i].style.webkitFilter = 'none';
          
        }
    }    
}

function zweirad(number) {
    var x = document.getElementsByClassName('showA');
    var y = document.getElementsByClassName('A');
    for (i = 0; i < x.length; i++) {
        if (i == number && x[number].style.display != 'grid') {
            x[number].style.display = 'grid';
            y[number].style.filter = 'invert(57%) sepia(77%) saturate(1569%) hue-rotate(345deg) brightness(98%) contrast(96%)';
            y[number].style.webkitFilter = 'invert(57%) sepia(77%) saturate(1569%) hue-rotate(345deg) brightness(98%) contrast(96%)';
                    
        } else {
            x[i].style.display = 'none';
            y[i].style.filter = 'none';
            y[i].style.webkitFilter = 'none';
        }
    }
}

function lkw(number) {
    var x = document.getElementsByClassName('showC');
    var y = document.getElementsByClassName('C');
    for (i = 0; i < x.length; i++) {
        if (i == number && x[number].style.display != 'grid') {
            x[number].style.display = 'grid';
            y[number].style.filter = 'invert(57%) sepia(77%) saturate(1569%) hue-rotate(345deg) brightness(98%) contrast(96%)';
            y[number].style.webkitFilter = 'invert(57%) sepia(77%) saturate(1569%) hue-rotate(345deg) brightness(98%) contrast(96%)';
        } else {
            x[i].style.display = 'none';
            y[i].style.filter = 'none';
            y[i].style.webkitFilter = 'none';
        }
    }
}

function traker(number) {
    var t = document.getElementsByClassName('showT');
    var y = document.getElementsByClassName('T');
    for (i = 0; i < t.length; i++) {
        if (i == number && t[number].style.display != 'grid') {
            t[number].style.display = 'grid';
            y[number].style.filter = 'invert(57%) sepia(77%) saturate(1569%) hue-rotate(345deg) brightness(98%) contrast(96%)';
            y[number].style.webkitFilter = 'invert(57%) sepia(77%) saturate(1569%) hue-rotate(345deg) brightness(98%) contrast(96%)';
        } else {
            t[i].style.display = 'none';
            y[i].style.filter = 'none';
            y[i].style.webkitFilter = 'none';
        }
    }
}

function show(number) {
    var t = document.getElementsByClassName('showKarte');
    var x = document.getElementsByClassName('bild');
    for (i = 0; i < t.length; i++) {
        if (i == number && t[number].style.display != 'grid') {
            t[number].style.display = 'grid';
            x[number].style.border = '.5rem solid red';
             
        } else {
            t[i].style.display = 'none';
            x[i].style.border = 'none';
            
        }
    }
}



