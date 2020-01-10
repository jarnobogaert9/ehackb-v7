'use strict';
//Door elementen zo aan te passen, kan men de styling en structuur van de seatmap zelf aanpassen zolang ze hun id hebben
occupied.forEach(function (curr) {
    $(`#seat${curr}`).addClass('unavailable');
});
owned.forEach(function (curr) {
    $(`#seat${curr}`).addClass('selected');
});