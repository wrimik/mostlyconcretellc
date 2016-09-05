jQuery(function($) {

    // $('#site-navigation').waypoint(function(direction) {
    //     if(direction === 'down' || $(this).hasClass('fixed-nav'))
    //         $(this).toggleClass( 'fixed-nav' );
    //  });
    $(document).on('scroll', function(){
        if($(document).scrollTop() > $('#masthead').height()){
            $('#site-navigation').addClass('fixed-nav');
        }else{
            $('#site-navigation').removeClass('fixed-nav');
        }
    });
});