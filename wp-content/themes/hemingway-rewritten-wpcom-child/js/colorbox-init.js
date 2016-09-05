jQuery(function ($) {
   $(document).ready(function() {
        if ($('.hidden-form').css('display') == 'none') {

            $('a[href*="#contact"]').colorbox({
                inline: true,
                width: '60%',
                height: '85%',
                onComplete: function() {
                    $('#contact').show();
                },
                onClosed: function () {
                    $('#contact').hide();
                }
            });
        }
   });
});