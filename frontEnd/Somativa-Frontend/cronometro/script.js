const timerEl = document.getElementById("timer");
const marksListElement = document.getElementById("marks-list");

let intervalid = 0;
let timer = 0;
let voltas = [];

const formatTime = (time) => {
    const hours = Math.floor(time / 360000);
    const minutes = Math.floor((time % 360000) / 6000);
    const seconds = Math.floor((time % 6000) / 100);
    const hundredths = time % 100;

    return `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}:${hundredths.toString().padStart(2, '0')}`;
}

const addMarkToList = (markIndex, markTimeValue) => {
    marksListElement.innerHTML += `<p>Marca ${markIndex}: ${formatTime(markTimeValue)}</p>`;
}

const markTime = () => {
    if (voltas[voltas.length - 1] === timer) {
        return; // Impede marcar o mesmo tempo múltiplas vezes
    }
    voltas.push(timer);
    addMarkToList(voltas.length, timer);
}

const toggleTimer = () => {
    const button = document.getElementById('power');
    const action = button.getAttribute('action'); 
    
    clearInterval(intervalid);

    if (action == 'start' || action == 'continue') {
        intervalid = setInterval(() => {
            timer += 1;
            setTimer(timer);
        }, 10);
        button.setAttribute('action', 'pause');
        button.innerHTML = '<i class="fa-solid fa-pause"></i>';
    } else if (action == 'pause') {
        button.setAttribute('action', 'continue');
        button.innerHTML = '<i class="fa-solid fa-play"></i>';
    }
}

const resetTimer = () => {
    clearInterval(intervalid);
    timer = 0;
    voltas = [];
    setTimer(timer);
    marksListElement.innerHTML = '';
    const button = document.getElementById('power');
    button.setAttribute('action', 'start');
    button.innerHTML = '<i class="fa-solid fa-play"></i>';
}

const setTimer = (time) => {
    timerEl.innerText = formatTime(time);
}

document.getElementById('power').addEventListener('click', toggleTimer);
document.getElementById('mark').addEventListener('click', markTime);
document.getElementById('reset').addEventListener('click', resetTimer);