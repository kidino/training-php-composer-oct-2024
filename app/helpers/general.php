<?php 

function is_active( $path ) {
    $fullURL = 'http';
    $fullURL .= (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] === "on")) ? 's' : '';
    $fullURL .= '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    $urlParts = parse_url($fullURL);

    // return ($path == $urlParts['path']) ? 'active' : '';

    return fnmatch($path, $urlParts['path']) ? 'active' : '';

}