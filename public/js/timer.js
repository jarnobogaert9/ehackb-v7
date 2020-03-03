console.log('ready');

let dueDate = new Date("Apr 24, 2020 00:00:00").getTime();

let x = setInterval(function () {

    let now = new Date().getTime();

    let distance = dueDate - now;

    let days = Math.floor(distance / (1000 * 60 * 60 * 24));
    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("days").innerHTML = days;
    document.getElementById("hours").innerHTML = hours;
    document.getElementById("mins").innerHTML = minutes;
    document.getElementById("secs").innerHTML = seconds;

    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "";
        //hier kan eventueel iets gezet worden als de countdown afgelopen is
    }
}, 1000);
