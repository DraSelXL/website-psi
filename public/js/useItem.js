/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/useItem.js ***!
  \*********************************/
$(".itemButton").on("click", function () {
  console.log($(this).attr("desc"));
  var desc = $(this).attr("desc");
  var fx = '(Usage effect: ' + $(this).attr("effect") + ')';
  var title = $(this).attr("name");
  $.confirm({
    title: '',
    useBootstrap: false,
    boxWidth: '400px',
    type: 'blue',
    content: "\n<div class=\"text-6xl text-center text-blue-400 my-4\">\n    <i class=\"fas fa-box-open\"></i>\n</div>\n<div class=\"text-xl text-center font-bold modal-title\">\n\n</div>\n<div class=\"text-lg modal-content\">\n\n</div>\n",
    onContentReady: function onContentReady() {
      $(".modal-content").html(desc);
      $(".modal-title").html(title);
      $(".modal-content").append("<br>");
      $(".modal-content").append(fx);
    },
    buttons: {
      yes: {
        text: 'Yes',
        btnClass: 'btn-green',
        action: function action() {}
      },
      no: {
        text: 'No',
        btnClass: 'btn-red'
      }
    }
  });
});
/******/ })()
;