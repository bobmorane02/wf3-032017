$(document).ready(function(){

    var isChecked = false;

    $('[type="checkbox"]').click(function(){

        var checkBoxArray = $('[type="checkbox"]').not($(this));
        for (var i=0;i<checkBoxArray.length;i++){
            checkBoxArray[i].checked = false;
            isChecked = true;
        };
        $('img').attr('src','img/chat'+$(this).val()+'.jpg');
    });

    $('.fa-times').click(function(){
        $('div').fadeOut();
        $('form')[0].reset();
        isChecked = false;
    });

    $('form').submit(function(e){
        e.preventDefault();
        var checkBoxArray = $('[type="checkbox"]');
         console.log(isChecked);
       
        if(isChecked){
            $('body').attr('style','background-image: url("'+$('img').attr('src')+'");');
            $('div img').attr('src',$('img').attr('src'));
            $('div p:last-child').css('display','none');
            $('div img').css('display','initial');
            $('div').fadeIn();
        } else {
            $('div img').css('display','none');
            $('div p:last-child').css('display','block');
            $('div').fadeIn();
        };
    });

});