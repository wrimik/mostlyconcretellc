jQuery(function($) {

	// Get the form.
	var form = $('#contact-form');

	// Get the messages div.
	var formMessages = $('#form-messages');

	var formMessagesBottom = $('#form-message-bottom');

	// Set up an event listener for the contact form.
	$(form).submit(function(e) {
		// Stop the browser from submitting the form.
		e.preventDefault();

		// Serialize the form data.
		var formData = new FormData(document.getElementById('contact-form'));

		$.ajax({
			url: $(form).attr('action'),
			type: 'POST',
			data: formData,
    		processData: false,
			contentType: false
		})
		.done(function(response) {
			// Make sure that the formMessages div has the 'success' class.
			$(formMessages).removeClass('error');

			$(formMessages).addClass('success');

			// Set the message text.
			$(formMessages).text(response);

			$(formMessagesBottom).removeClass('error');
			$(formMessagesBottom).addClass('success');
			$(formMessagesBottom).text(response);

			// Clear the form.
			$('#name').val('');
			$('#email').val('');
			$('#message').val('');
		})
		.fail(function(data) {
			// Make sure that the formMessages div has the 'error' class.
			$(formMessages).removeClass('success');
			$(formMessagesBottom).removeClass('success');
			$(formMessages).addClass('error');
			$(formMessagesBottom).addClass('error');

			// Set the message text.
			if (data.responseText !== '') {
				$(formMessages).text(data.responseText.replace(/(<([^>]+)>)/ig,""));
				$(formMessagesBottom).text(data.responseText.replace(/(<([^>]+)>)/ig,""));
			} else {
				$(formMessages).text('Oops! An error occurred and your message could not be sent.');
				$(formMessagesBottom).text('Oops! An error occurred and your message could not be sent.');
			}
		});

	});

});
