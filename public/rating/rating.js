// product review script

var clicked = 0;

$('#1_star').hover(function(){
    $('#1_star').attr('src','/frontend/assets/images/star.png');
    $('#2_star').attr('src','/frontend/assets/images/blank_star.png');
    $('#3_star').attr('src','/frontend/assets/images/blank_star.png');
    $('#4_star').attr('src','/frontend/assets/images/blank_star.png');
    $('#5_star').attr('src','/frontend/assets/images/blank_star.png');
    clicked = 1;
    $('#rating_point').val(clicked)
});

$('#1_star').click(function(){
    clicked = 1;
    $('#rating_point').val(clicked)
});

$('#2_star').hover(function(){
    $('#1_star').attr('src','/frontend/assets/images/star.png');
    $('#2_star').attr('src','/frontend/assets/images/star.png');
    $('#3_star').attr('src','/frontend/assets/images/blank_star.png');
    $('#4_star').attr('src','/frontend/assets/images/blank_star.png');
    $('#5_star').attr('src','/frontend/assets/images/blank_star.png');
    clicked = 2;
    $('#rating_point').val(clicked)
});

$('#2_star').click(function(){
    clicked = 2;
    $('#rating_point').val(clicked)
});


$('#3_star').hover(function(){
    $('#1_star').attr('src','/frontend/assets/images/star.png');
    $('#2_star').attr('src','/frontend/assets/images/star.png');
    $('#3_star').attr('src','/frontend/assets/images/star.png');
    $('#4_star').attr('src','/frontend/assets/images/blank_star.png');
    $('#5_star').attr('src','/frontend/assets/images/blank_star.png');
    clicked = 3;
    $('#rating_point').val(clicked)

});

$('#3_star').click(function(){
    clicked = 3;
    $('#rating_point').val(clicked)
});


$('#4_star').hover(function(){
    $('#1_star').attr('src','/frontend/assets/images/star.png');
    $('#2_star').attr('src','/frontend/assets/images/star.png');
    $('#3_star').attr('src','/frontend/assets/images/star.png');
    $('#4_star').attr('src','/frontend/assets/images/star.png');
    $('#5_star').attr('src','/frontend/assets/images/blank_star.png');
    clicked = 4;
    $('#rating_point').val(clicked)
});

$('#4_star').click(function(){
    clicked = 4;
    $('#rating_point').val(clicked)
});


$('#5_star').hover(function(){
    $('#1_star').attr('src','/frontend/assets/images/star.png');
    $('#2_star').attr('src','/frontend/assets/images/star.png');
    $('#3_star').attr('src','/frontend/assets/images/star.png');
    $('#4_star').attr('src','/frontend/assets/images/star.png');
    $('#5_star').attr('src','/frontend/assets/images/star.png');
    clicked = 5;
    $('#rating_point').val(clicked)
});

$('#5_star').click(function(){
    clicked = 5;
    $('#rating_point').val(clicked)
});

