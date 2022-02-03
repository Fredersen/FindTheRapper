const timerElement = document.getElementById("timer")
const lostElement = document.getElementById("lost")
const rapper = document.getElementById('rapper')
const winElement = document.getElementById('win')

let temps = timerElement.innerText
const gameTime = temps * 1000 + 2000
timerElement.innerText = temps

function diminuerTemps() {
    timerElement.innerText = temps
    temps = temps <= 0 ? 0 : temps - 1
}

let interval = setInterval(diminuerTemps, 1000)

let timer = setTimeout(
    function(){
        lostElement.style.display = 'block'
    }
    ,gameTime/// milliseconds = 10 seconds
);

rapper.addEventListener('click', function win() {
    clearTimeout(timer)
    clearInterval(interval)
    winElement.style.display = 'block'
})


