<?php

// Needed to use wp functionality.
require( '/home5/orangfc1/public_html/mostlyconcretellc.com/wp-blog-header.php' );

// Only process POST requests.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $response_mail   = "";
    $response_upload = "";
    $file_name = "";

    // Get the form fields and remove whitespace.
    $name    = strip_tags(trim($_POST["name"]));
    $name    = str_replace(array("\r", "\n"), array(" ", " "), $name);
    $email   = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Check that data was sent to the mailer.
	if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		// Set a 400 (bad request) response code and exit.
		http_response_code(400);
		echo "Oops! There was a problem with your submission. Please complete the form and try again.";
		exit;
	}

    if ($file_uploaded = isset($_FILES['userfile'])) {

        // Upload path
        $upload_dir  = wp_upload_dir();
        $upload_path = $upload_dir['basedir'];

        // Contains all the file info
        $file = $_FILES['userfile'];

        // File properties
        $file_name  = $file['name'];
        $file_tmp   = $file['tmp_name'];
        $file_size  = $file['size'];
        $file_error = $file['error'];
        $file_max   = 250000000; //$_POST['MAX_FILE_SIZE'];

        // Get the file extension
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));

        // PDF is all that were allowing right now it may make sense to add
        // more latter
        $allowed = 'pdf';

        if (strcmp($allowed, $file_ext)) {
            // Set a 415 (Unsupported Media Type) code response and exit
            http_response_code(415);
            echo "Oops! Only pdf's are excepted sorry. Please try again.";
            exit;
        }

        if ($file_error) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo codeToMessage($file_error);
            exit;
        }

        if ($file_size > $file_max) {
            // Set a 413 (Too Large) code response and exit
            http_response_code(415);
            echo "Oops! File is to big to upload here. No worries just call".
            " or email us and we can upload the file another way.";
            exit;
        }

        $file_name_new    = $name.'_'.uniqid('', true).'.'.$file_ext;
        $file_destination = $upload_path.'/'.$file_name_new;
        $response_upload  = $file_destination;

        if (!move_uploaded_file($file_tmp, $file_destination)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your upload. Please complete the form and try again.";
            exit;
        }

    }


	// Set the recipient email address.
	// FIXME: Update this to your desired email address.
	$recipient = "fake@some.com";

	// Set the email subject.
	$subject = "New contact from $name";

	// Build the email content.
	$email_content = "Name: $name\n";
	$email_content .= "Email: $email\n\n";
    $email_content .= "Upload: $file_name_new";
	$email_content .= "Message:\n$message\n";

	// Build the email headers.
	$email_headers = "From: $name <$email>";

	// Send the email.
	if (mail($recipient, $subject, $email_content, $email_headers)) {
		// Set a 200 (okay) response code.
		http_response_code(200);
		echo "Thank You! Your message has been sent" .
            (($file_uploaded) ? " and " . $file_name . " has been uploaded."
                : ".");
	} else {
		// Set a 500 (internal server error) response code.
		http_response_code(500);
		echo "Oops! Something went wrong and we couldn't send your message.";
	}

} else {
	// Not a POST request, set a 403 (forbidden) response code.
	http_response_code(403);
	echo "There was a problem with your submission, please try again.";
}

?>
