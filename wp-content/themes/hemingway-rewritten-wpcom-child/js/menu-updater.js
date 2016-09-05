jQuery(function($) {

    $(document).ready(function ( ) {
        $('.menu-main-nav-container').find('a').each(function(){

            if ($( this ).attr('href') === '#contact' )
                return true; // Continue

            if ( $( this ).attr('href').charAt(0) === '#' ){
                var link = $(this);
                var anchor = link.attr('href');
                var local_path = '/';

                link.attr('href', local_path + anchor);

            }

        });
    });
});