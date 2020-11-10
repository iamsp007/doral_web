"use strict";

$(function () {
  $("#checkAll").on('click', function () {
    $('.role-card input:checkbox').not(this).prop('checked', this.checked);
  });
  $("#checkAll_1").on('click', function () {
    $('.role-card-2 input:checkbox').not(this).prop('checked', this.checked);
  });
  $("#checkAll_3").on('click', function () {
    $('.role-card-3 input:checkbox').not(this).prop('checked', this.checked);
  });
  $("#searchItem").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $(".scroll-1 div").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
  $("#searchItem1").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $(".scroll-2 div").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
  $("#searchItem2").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $(".scroll-3 div").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
  $(".collapse.show").each(function () {
    $(this).prev(".card-header").find(".las").addClass("la-minus").removeClass("la-plus");
  });
  $(".collapse").on('show.bs.collapse', function () {
    $(this).prev(".card-header").find(".las").removeClass("la-plus").addClass("la-minus");
    $(".card-header").css('border-bottom', '1px solid #e4e4e4');
  }).on('hide.bs.collapse', function () {
    $(this).prev(".card-header").find(".las").removeClass("la-minus").addClass("la-plus");
  });
  $(".card-body").parents('.card-header').css("border-bottom", "none");
  tail.select("#department", {
    search: true,
    placeholder: "Select Department"
  });
  tail.select("#rolesOfUser", {
    search: true,
    placeholder: "Select Roles"
  });
});