<?php
echo "Root:" . $root = $_SERVER['DOCUMENT_ROOT'] . '<br />';

echo "Path info: <br/>";


// echo $path_parts['dirname'] . "<br/>";
// echo $path_parts['basename'] . "<br/>";
// echo $path_parts['extension'] . "<br/>";
// echo $path_parts['filename'] . "<br/>"; // since PHP 5.2.0

// Needed to use wp functionality.
require( '/home5/orangfc1/public_html/mostlyconcretellc.com/wp-blog-header.php' );

$upload_dir = wp_upload_dir(); // Array of key => value pairs
/*
    $upload_dir now contains something like the following (if successful)
    Array (
        [path] => C:\path\to\wordpress\wp-content\uploads\2010\05
        [url] => http://example.com/wp-content/uploads/2010/05
        [subdir] => /2010/05
        [basedir] => C:\path\to\wordpress\wp-content\uploads
        [baseurl] => http://example.com/wp-content/uploads
        [error] =>
    )
    // Descriptions
    [path] - base directory and sub directory or full path to upload directory.
    [url] - base url and sub directory or absolute URL to upload directory.
    [subdir] - sub directory if uploads use year/month folders option is on.
    [basedir] - path without subdir.
    [baseurl] - URL path without subdir.
    [error] - set to false.
*/

echo $upload_dir['path'] . '<br />';
echo $upload_dir['url'] . '<br />';
echo $upload_dir['subdir'] . '<br />';
echo "Basedir: <br />";
echo $upload_dir['basedir'] . '<br />';
echo "Baseurl: <br />";
echo $upload_dir['baseurl'] . '<br />';
echo $upload_dir['error'] . '<br />';

$upload_url = ( $upload_dir['url'] );
$upload_url_alt = ( $upload_dir['baseurl'] . $upload_dir['subdir'] );

// Now echo the final result
echo $upload_url . '<br />'; // Output - http://example.com/wp-content/uploads/2010/05

// Using year and month based folders, the below will be the same as the line above.
echo $upload_url_alt . '<br />'; // Output - http://example.com/wp-content/uploads/2010/05
?>