
$(".change").on("click", function () {
  if ($("html").hasClass("dark")) {
    $("html").removeClass("dark");
    $(".change").html('<img src="/assets/img/icons/dark_mode_black_24dp.svg">');
  } else {
    $("html").addClass("dark");
    $(".change").html('<img src="/assets/img/icons/light_mode_black_24dp.svg">');
  }
});
let newsModal = new bootstrap.Modal(document.getElementById('newsletterModal'));
window.onload = function () {
  setTimeout(function () {
    newsModal.show()
  }, 3000);
}

var doc = new jsPDF();

function printDiv(divId,
  title) {

  let mywindow = window.open('', 'PRINT', 'height=650,width=900,top=100,left=150');

  mywindow.document.write(`<html><head><title>${title}</title>`);
  mywindow.document.write('</head><body >');
  mywindow.document.write(document.getElementById(divId).innerHTML);
  mywindow.document.write('</body></html>');

  mywindow.document.close(); // necessary for IE >= 10
  mywindow.focus(); // necessary for IE >= 10*/

  mywindow.print();
  mywindow.close();

  return true;
}