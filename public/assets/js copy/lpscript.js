$(document).ready(function () {
    setTimeout(function () {
        $("#infaq-santri").modal('show');
    }, 0);
})

var i = 100;

setTimeout(function () {
    $("#infaq-santri").modal('hide');
}, 5000);

var counterBack = setInterval(function () {
  i--;
  if (i > 0) {
    $('.progress-bar').css('width', i + '%');
  } else {
    clearInterval(counterBack);
  }

}, 45);