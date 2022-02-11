const timerElement = document.getElementById("timer")
const lostElement = document.getElementById("lost")
const rapper = document.getElementById('rapper')
const winElement = document.getElementById('win')
const map = document.getElementById('map')
const music = document.getElementById('music')
const start = document.getElementById('start')
const rapperPicture = document.getElementById('rapperPicture')
const musicWin = document.getElementById('musicWin')
const missClick = document.getElementById('missClick')
const musicMiss = document.getElementById('musicMiss')
const musicOver = document.getElementById('musicOver')

const audio = new Audio(music.dataset.audio)
const audioWin = new Audio(musicWin.dataset.win)
const audioMiss = new Audio(musicMiss.dataset.miss)
const audioOver = new Audio(musicOver.dataset.over)

let inter;
let delay;
let counter = 1;

let temps = timerElement.innerText
const gameTime = temps * 1000 + 2000
timerElement.innerText = temps

let rapperPosition = rapper.getBoundingClientRect();

function diminuerTemps() {
    timerElement.innerText = temps
    temps = temps <= 0 ? 0 : temps - 1
}

function getCoords(event) {
    let x = event.clientX;
    let y = event.clientY;
    return {x,y}
}

function calcD(aX, aY, bX, bY) {
    const d = Math.round(Math.sqrt((aX - bX)**2 + (aY - bY)**2))
    return d
}

function interval () {
   inter = setInterval(diminuerTemps, 1000)
}

function timer () {
    delay = setTimeout(
    function(){
        lostElement.style.display = 'block'
        audio.pause()
        audioOver.play()
        audioOver.volume = 1.5
    }
    ,gameTime/// milliseconds = 10 seconds
)}

function stopInterval () {
    clearInterval(inter)
}

function stopDelay () {
    clearTimeout(delay)
}

start.addEventListener('click', function () {
    interval()
    timer()
    start.style.display = 'none'
    rapper.style.visibility = 'visible'
    audio.loop = true
    audio.play()
})

map.addEventListener ('mousemove' , (event) => {
    const mousePosition = getCoords(event)
    const distanceBetweenMouseAndRapper = calcD(mousePosition.x, mousePosition.y, rapperPosition.x + 25, rapperPosition.y + 25)
    let volume = 1 - distanceBetweenMouseAndRapper / 1000
    audio.volume = volume
    audio.pitch = volume * 4
    audio.playbackRate = volume * 2.2
})

let stopFunction = false

rapper.addEventListener('click', function () {
    stopInterval()
    stopDelay()
    winElement.style.display = 'block'
    audio.pause()
    audio.loop = false
    rapperPicture.classList.add('clicked')
    audioWin.play()
    stopFunction = true
})

map.addEventListener('click', () => {
    if (!stopFunction){
        missClick.innerHTML = 'Echecs : ' + counter
        counter ++
        audio.pause()
        audioMiss.play()
        setTimeout(
            function(){
                audio.play()
            }
            , 2000
        )
    }
})

