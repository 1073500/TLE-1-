//timeout zorgt voor 1 sec
setInterval(() => showTime,1000)
function showTime(){
    let time = new Date()
    let hours = time.getHours()
    let minutes = time.getMinutes()
    let seconds = time.getSeconds()

    let currentTime = hours + ":" + minutes +":" + seconds


    // document.getElementById('clock') = currentTime
// console.log(time)
}

function showDate(){
    let time = new Date()

    let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]

    let year = time.getFullYear()
    let month = time.getMonth()
    let date = time.getDate()

    // console.log(month)
    let datediv = document.getElementById('date')

    for (let i = 0; i < months.length + 1; i++) {
        if (i === month){
            let currentMonth = months[i]
            // console.log(currentMonth)
            datediv.innerHTML(currentMonth)
            // console.log(datediv)
        }

    }
}
showDate()
showTime()