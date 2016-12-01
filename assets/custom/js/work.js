$(document).ready(function(){
    $('body').hide().fadeIn('slow');

    $(document).on('submit', '#ratingsForm', function(e) {
        sendRating(e, $(this).closest('form'));
    });

    $(document).on('click', '.container-slide .control', function(e){
        $(this).closest('.container-slide').toggleClass('hover');
    });
});

function sendRating(e, form ){
	var arr = { user_name: form.find('#name').val(),
				rating: form.find('.rating').find('input:checked').val(),
				text: form.find('#comment').val()
	};
    console.log(arr);
    $.ajax({
        url: form.attr('action'),
        dataType: 'json',
        type: 'post',
        contentType: 'application/json; charset=utf-8',
        data: JSON.stringify(arr),
        success: function(  ){
            alert('Erfolgreich');
            location.reload();    
        },
        error: function( data ){
            alert('Nicht erfolgreich');
        }
    });
    e.preventDefault();
}