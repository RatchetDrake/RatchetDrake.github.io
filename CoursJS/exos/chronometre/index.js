let heure = 0; let minute = 0; let seconde = 0; let milisecond = 0
let Interval

function affiche() {    
    let Affichage = document.getElementById('Affichage')
    Affichage.textContent = `${heure} h : ${minute} min : ${seconde} s : ${milisecond} ms`
}
function chrono() {
    affiche()

    milisecond++

    if (milisecond == 1000) {
        milisecond = 0
        seconde++
    } 
    if (seconde == 60) {
        seconde = 0
        minute++
    }
    if (minute == 60) {
        minute = 0
        heure++
    }
}

function start() {
    if (!Interval)
        Interval = setInterval(chrono, 1)
}
function stop() {
    if (Interval) {
        clearInterval(Interval)
        Interval = null
    }
}
function reset() {
    heure = 0
    minute = 0
    seconde = 0
    milisecond = 0

    stop()
    affiche()
}