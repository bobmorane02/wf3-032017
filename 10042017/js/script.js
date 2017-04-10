$(document).ready(function(){

    $('.fa-times').click(function(){
        $('div').fadeOut();
        $('form')[0].reset();
        formOk = 0;       
    });

    function error (ele){
        ele.addClass('error');
    };

    $('input,textarea,select').focus(function(){
        $(this).removeClass('error');
    });

    $('form').submit(function(e){

        e.preventDefault();
        var formOk = 0;

        if($('[type="text"]').val().length == 0){
             error($('[type="text"]'));
        } else {
            formOk++;
        };

        if($('[type="email"]').val().length < 5){
            error($('[type="email"]'));
        } else {
            formOk++;
        };

        if($('select').val() == 'null'){
            error($('select'));
        } else {
            formOk++;
        }

        if($('textarea').val().length == 0){
            error($('textarea'));
        } else {
            formOk++;
        }

        if(formOk == 4){
            $('div h2 span').text($('[type="text"]').val());
            $('div p b').text($('select').val());
            $('div p:last-of-type').text($('textarea').val());
            $('div').fadeIn();
        }
    });


});