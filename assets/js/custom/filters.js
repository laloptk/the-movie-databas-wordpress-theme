jQuery(document).ready(function($) {
    let genre, year, actorName;
    $('#movies-filter').on('submit', (event) => {
        event.preventDefault();
        genre = $('#genre').val();
        year = $('#year').val();
        actorName = $('#actor-name').val();

        $.ajax({
            type: "post",
            url: ajax_var.url,
            data: { action: 'filter_movies', genre: genre, year:year, actor: actorName },
            method : 'POST',
            success: function(result){
                $('.movies__wrap').html(result);
            }
        });
    });
});