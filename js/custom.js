"use strict";

jQuery(document).ready(function ($) {
  var genre, year, actorName;
  $('#movies-filter').on('submit', function (event) {
    event.preventDefault();
    genre = $('#genre').val();
    year = $('#year').val();
    actorName = $('#actor-name').val();
    $.ajax({
      type: "post",
      url: ajax_var.url,
      data: {
        action: 'filter_movies',
        genre: genre,
        year: year,
        actor: actorName
      },
      method: 'POST',
      success: function success(result) {
        $('.movies__wrap').html(result);
      }
    });
  });
});