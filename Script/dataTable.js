$(document).ready(function () {
  $("#example").DataTable();

  if ($("#example_filter").find("input").length) {
    $("#example_filter").find("input").addClass("text-bg-dark");
  }

  if ($("#example_length").find("select").length) {
    $("#example_length").find("select").addClass("text-bg-dark");
  }

  /* $("#example_paginate").each(function () {
    if ($(this).find("a").length) {
      $(this).find("a").addClass("text-bg-dark");
      $(this).find("li.active").find("a").removeClass("text-bg-dark");
    }
  }); */
});
