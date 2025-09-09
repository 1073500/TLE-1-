window.addEventListener('load', init);

let calender
let thegram
let poweroff

function init() {
    makeContents()
}

function makeContents() {
    calender = document.createElement('image')
    thegram = document.createElement('a')
    poweroff = document.createElement('image')
}