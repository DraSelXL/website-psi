/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/adminNavbar.js ***!
  \*************************************/
$(function () {
  var theNavbar = $("#the-navbar");
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $("#hamburger-btn").on("click", toggleNavbar);
  $(".navbar-btn").on("click", toggleNavbar);
  $("#post-game-btn").on("click", loadPostGameInput);
  $("#leaderboard-btn").on("click", function () {
    $.ajax({
      url: 'admin/leaderboard',
      method: 'get'
    }).done(function (response) {
      $("#content").html(response);
    });
  });
  $("#team-stats-btn").on("click", function () {
    $.ajax({
      url: 'admin/teamStats',
      method: 'get'
    }).done(function (response) {
      $("#content").html(response);
    });
  });
  $("#team-history-btn").on("click", function () {
    $.ajax({
      url: 'admin/teamHistory',
      method: 'get'
    }).done(function (response) {
      $("#content").html(response);
    });
  });
  loadPostGameInput();
});

function loadPostGameInput() {
  $.ajax({
    url: 'admin/postGame',
    method: 'get'
  }).done(function (response) {
    $("#content").html(response);
  });
}

function toggleNavbar() {
  $("#the-navbar").toggleClass("-translate-x-52");
  $("#psi2021").toggleClass("hidden");
  $("#navbar-items").toggleClass("hidden");
}
/******/ })()
;