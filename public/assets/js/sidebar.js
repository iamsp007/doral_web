$(function(){
$('.cbp-vimenu li').on('click',function(){

    //Remove any previous active classes
    $('.cbp-vimenu li').removeClass('active');
  
    //Add active class to the clicked item
    $(this).addClass('active');

    //adding the state for this parent menu
    $(this).parents('li').addClass('active');
  });
});