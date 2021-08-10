/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/adminMisc.js ***!
  \***********************************/
$("#save-btn").on("click", function () {
  $.ajax({
    url: 'admin/saveMisc',
    method: 'post',
    data: {
      use_item: $("#useItemCB").val(),
      freeze_leaderboard: $("#freezeCB").val(),
      finish: $("#finishCB").val()
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
$("#finish-btn").on("click", finishGame);

function finishGame() {
  $.confirm({
    title: '',
    useBootstrap: false,
    boxWidth: '400px',
    type: 'orange',
    content: "\n        <div class=\"text-6xl text-center text-yellow-400 my-4\">\n            <i class=\"fas fa-question-circle\"></i>\n        </div>\n        <div class=\"text-xl text-center font-bold\">\n            Are You Sure?\n        </div>\n        ",
    buttons: {
      yes: {
        text: 'Hell Yes!',
        btnClass: 'btn-green',
        action: function action() {
          $.ajax({
            url: 'admin/finishGame',
            method: 'post'
          }).done(function (response) {
            if (response == 1) {
              $.alert({
                title: '',
                useBootstrap: false,
                boxWidth: '400px',
                type: 'green',
                content: "\n                                <div class=\"text-6xl text-center text-themegreen my-4\">\n                                    <i class=\"fas fa-flag-checkered\"></i>\n                                </div>\n                                <div class=\"text-xl text-center font-bold\">\n                                    Game Finished!\n                                </div>"
              });
            }
          });
        }
      },
      no: {
        text: 'Hell No!',
        btnClass: 'btn-red'
      }
    }
  });
}
/******/ })()
;