jQuery(function($) {

    $(document).ready(function ( ) {
        $('.menu-nav-container').find('a').each(function(){

            if ( $( this ).attr('href').charAt(0) === '#' ){
                var link = $(this);
                var anchor = link.attr('href');
                var local_path = $(location).attr('hostname') + '/';

                link.attr('href', local_path + anchor);

            }

        });
    });
});