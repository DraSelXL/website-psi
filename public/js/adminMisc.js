/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/adminMisc.js ***!
  \***********************************/
$("#save-btn").on("click", function () {
  console.log($("#useItemCB").val());
  console.log($("#freezeCB").val());
  $.ajax({
    url: 'admin/saveMisc',
    method: 'post',
    data: {
      use_item: $("#useItemCB").val(),
      freeze_leaderboard: $("#freezeCB").val()
    }
  }).done(function (response) {
    if (response === '1') {
      $.confirm({
        title: '',
        useBootstrap: false,
        boxWidth: '400px',
        type: 'green',
        content: "\n<div class=\"text-6xl text-center text-themegreen my-4\">\n    <i class=\"fas fa-check-circle\"></i>\n</div>\n<div class=\"text-xl text-center font-bold\">\n    Changes saved!\n</div>\n",
        buttons: {
          ok: {}
        }
      });
    }
  });
});
/******/ })()
;