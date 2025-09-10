// let section1 = document.getElementsByClassName('1')
//
//
//
// function makeContents() {
//     let calender = document.createElement('img')
//     let thegram = document.createElement('a')
//     let poweroff = document.createElement('img')
//
//     calender.src = "images/catwet.png"
//
//
//
//     let calenderdiv = document.createElement('div')
//     let thegramdiv = document.createElement('div')
//     let poweroffdiv = document.createElement('div')
//
//
//     section1.append(calenderdiv, thegramdiv, poweroffdiv)
//     calenderdiv.appendChild(calender)
// }
// makeContents()

function showTime(){
    let time = new Date()
    let hours = time.getHours()
    let minutes = time.getMinutes()
    let seconds = time.getSeconds()

    let currentTime = hours + ":" + minutes +":" + seconds

    document.getElementsByClassName(
        'time'
    )
        intime.innerhtml(currentTime)


}

showTime()